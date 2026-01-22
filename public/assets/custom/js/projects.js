document.addEventListener("DOMContentLoaded", () => {
    setupSearch();
    setupDragAndDrop();
    setupModals();
});

/* =========================
    SEARCH (same behavior)
========================= */
function setupSearch() {
    const searchInput = document.getElementById("search");
    const clearBtn = document.getElementById("clear-btn");

    if (!searchInput || !clearBtn) return;

    function filterLogs() {
        const term = (searchInput.value || "").toLowerCase().trim();

        document.querySelectorAll(".column-container .box").forEach((box) => {
            const text = (box.textContent || "").toLowerCase();
            box.style.display =
                term === "" || text.includes(term) ? "" : "none";
        });

        clearBtn.style.display =
            searchInput.value.length > 0 ? "block" : "none";
    }

    searchInput.addEventListener("input", filterLogs);

    clearBtn.addEventListener("click", () => {
        searchInput.value = "";
        filterLogs();
        clearBtn.style.display = "none";
        searchInput.focus();
    });

    filterLogs();
}

/* =========================
    DRAG + DROP
========================= */
function setupDragAndDrop() {
    const app = document.getElementById("app");
    const permission = app?.dataset?.permission;

    if (permission !== "admin") return;

    document.querySelectorAll(".box").forEach((box) => {
        box.setAttribute("draggable", "true");

        box.addEventListener("dragstart", (e) => {
            box.classList.add("dragging");
            e.dataTransfer.setData("text/plain", box.dataset.id);
            e.dataTransfer.effectAllowed = "move";
        });

        box.addEventListener("dragend", () => {
            box.classList.remove("dragging");
            document
                .querySelectorAll(".dropzone")
                .forEach((z) => z.classList.remove("drag-over"));
        });
    });

    document.querySelectorAll(".dropzone").forEach((dropzone) => {
        dropzone.addEventListener("dragover", (e) => {
            e.preventDefault();
            e.dataTransfer.dropEffect = "move";
        });

        dropzone.addEventListener("dragenter", (e) => {
            e.preventDefault();
            dropzone.classList.add("drag-over");
        });

        dropzone.addEventListener("dragleave", () => {
            dropzone.classList.remove("drag-over");
        });

        dropzone.addEventListener("drop", (e) => {
            e.preventDefault();
            dropzone.classList.remove("drag-over");

            const projectId = e.dataTransfer.getData("text/plain");
            const box = document.querySelector(`.box[data-id="${projectId}"]`);
            const newStatus = dropzone.closest(".column-container")?.id;

            if (!box || !newStatus) return;

            if (box.parentNode !== dropzone) dropzone.appendChild(box);

            updateProjectStatus(projectId, newStatus);
        });
    });
}

function updateProjectStatus(projectId, status) {
    fetch(`/projects/${projectId}/status`, {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN":
                document.querySelector('meta[name="csrf-token"]')?.content ||
                "",
            Accept: "application/json",
        },
        body: JSON.stringify({ status }),
    })
        .then(async (res) => {
            if (!res.ok) throw new Error(await res.text());
            return res.json().catch(() => ({}));
        })
        .then(() => console.log("✅ Project status updated!"))
        .catch((err) => {
            console.error("❌ Failed to update status:", err);
        });
}

/* =========================
    MODALS (basic, no select2)
========================= */
function setupModals() {
    const addModalEl = document.getElementById("add-project");
    const editModalEl = document.getElementById("edit-project-modal");

    // Create
    document.getElementById("create-project")?.addEventListener("click", () => {
        const form = document.getElementById("create-form");
        if (!form) return;

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        console.log("✅ Project created successfully!");

        setTimeout(() => {
            const modal = bootstrap.Modal.getInstance(addModalEl);
            if (modal) modal.hide();
            location.reload();
        }, 800);
    });

    // Double click card to open edit modal
    document.querySelectorAll(".box").forEach((box) => {
        box.addEventListener("dblclick", () => {
            const id = box.dataset.id;
            if (!id) return;
            openEditModalFromCard(box);
        });
    });

    // Update
    document.getElementById("update-project")?.addEventListener("click", () => {
        const form = document.getElementById("update-form");
        if (!form) return;

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        console.log("✅ Project updated successfully!");

        setTimeout(() => {
            const modal = bootstrap.Modal.getInstance(editModalEl);
            if (modal) modal.hide();
            location.reload();
        }, 800);
    });
}

function openEditModalFromCard(boxEl) {
    const editModalEl = document.getElementById("edit-project-modal");
    if (!editModalEl) return;

    const id = boxEl.dataset.id;
    const name = boxEl.querySelector(".drag-handle")?.textContent?.trim() || "";
    const status = boxEl.closest(".column-container")?.id || "idle";

    document.getElementById("ProjectId").value = id || "";
    document.getElementById("ProjectName").value = name;
    document.getElementById("ProjectStatus").value = status;

    const descEl = document.getElementById("DescriptionUpdate");
    if (descEl) descEl.value = "";

    const modal = new bootstrap.Modal(editModalEl);
    modal.show();
}
