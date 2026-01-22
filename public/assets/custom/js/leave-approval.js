document.addEventListener("DOMContentLoaded", () => {
    approveLeave();
    denyLeave();
});
function approveLeave() {
    document.querySelectorAll(".approve_button").forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            const card = this.closest(".leave-card");
            const leaveId = card.dataset.leaveId;
            fetch("/approve/leave", {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'input[name="_token"]',
                    ).value,
                },
                body: JSON.stringify({ id: leaveId }),
            })
                .then((res) => res.json())
                .then((data) => {
                    console.log(data);
                    if (data.success) {
                        const card = this.closest(".leave-card");
                        card.remove();
                        console.log(data.message);
                    } else {
                        console.log("Failed: " + data.message);
                    }
                })
                .catch((err) => {
                    console.error(err);
                });
        });
    });
}

function denyLeave() {
    document.querySelectorAll(".deny_button").forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            const card = this.closest(".leave-card");
            const leaveId = card.dataset.leaveId;
            fetch("/deny/leave", {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'input[name="_token"]',
                    ).value,
                },
                body: JSON.stringify({ id: leaveId }),
            })
                .then((res) => res.json())
                .then((data) => {
                    console.log(data);
                    if (data.success) {
                        const card = this.closest(".leave-card");
                        card.remove();
                        console.log(data.message);
                    } else {
                        console.log("Failed: " + data.message);
                    }
                })
                .catch((err) => {
                    console.error(err);
                });
        });
    });
}
