document.querySelectorAll('.tom-select').forEach(el => {
    new TomSelect(el, {
        sortField: {
            field: "text",
            direction: "asc"
        },
        plugins: {
            'clear_button': {
                'title': 'Remove all selected options',
            }
        },
        persist: false,
    });
})