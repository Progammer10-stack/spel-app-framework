(() => {
    const minChars = 3;

    const hideList = (list) => {
        list.hidden = true;
        list.innerHTML = '';
    };

    const initAutocomplete = (root) => {
        const itemsScript = root.querySelector('[data-autocomplete-items]');
        const nameInput = root.querySelector('[data-autocomplete-input]');
        const idInput = root.querySelector('[data-autocomplete-value]');
        const list = root.querySelector('[data-autocomplete-list]');
        const form = root.closest('form');

        if (!itemsScript || !nameInput || !idInput || !list) {
            return;
        }

        const items = JSON.parse(itemsScript.textContent || '[]');

        const selectItem = (item) => {
            nameInput.value = item.label;
            idInput.value = item.id;
            hideList(list);
        };

        const matchExactLabel = (query) => {
            return items.find((item) => item.label.toLowerCase() === query.toLowerCase()) || null;
        };

        const showSuggestions = (query) => {
            const matches = items.filter((item) =>
                item.label.toLowerCase().includes(query.toLowerCase())
            );

            list.innerHTML = '';

            if (matches.length === 0) {
                hideList(list);
                return;
            }

            matches.forEach((item) => {
                const row = document.createElement('li');
                const button = document.createElement('button');
                button.type = 'button';
                button.textContent = item.label;
                button.addEventListener('click', () => selectItem(item));
                row.appendChild(button);
                list.appendChild(row);
            });

            list.hidden = false;
        };

        nameInput.addEventListener('input', () => {
            idInput.value = '';
            const query = nameInput.value.trim();

            if (query.length < minChars) {
                hideList(list);
                return;
            }

            showSuggestions(query);
        });

        if (form) {
            form.addEventListener('submit', () => {
                if (idInput.value) {
                    return;
                }

                const match = matchExactLabel(nameInput.value.trim());
                if (match) {
                    idInput.value = match.id;
                }
            });
        }
    };

    document.querySelectorAll('[data-autocomplete]').forEach(initAutocomplete);

    document.addEventListener('click', (event) => {
        document.querySelectorAll('[data-autocomplete]').forEach((root) => {
            if (root.contains(event.target)) {
                return;
            }

            const list = root.querySelector('[data-autocomplete-list]');
            if (list) {
                hideList(list);
            }
        });
    });
})();
