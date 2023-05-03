const formAddBook = document.querySelector('#addBooksForm');

if (formAddBook) {
    formAddBook.addEventListener('submit', (e) => {
        e.preventDefault();
        fetch('/super-week/books/write', { // modifier la route ici
            method: 'POST',
            body: new FormData(formAddBook)
        })
            .then(res => res.json())
            .then(data => {
                console.log(data);
                const alert = document.querySelector('#error');
                const alertTitle = document.querySelector('#titleError');
                const alertDescription = document.querySelector('#descriptionError');
                if (data.user) {
                    alert.innerHTML = `
                    <p class="bg-red-100 p-2" >${data.user}</p>
                  `;
                } else if (data.title) {
                    alert.innerHTML = `
                    <p class="bg-red-100 p-2" >${data.title}</p>
                  `;
                } else if (data.description) {
                    alert.innerHTML = `
                    <p class="bg-red-100 p-2" >${data.description}</p>
                  `;
                }

            });
    });
}
