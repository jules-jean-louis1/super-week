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
                alert.innerHTML = '';
                alertTitle.innerHTML = '';
                alertDescription.innerHTML = '';
                if (data.user) {
                    alert.innerHTML = `
                        <p class="bg-red-100 p-2">${data.user}</p>
                    `;
                } if (data.title) {
                    alertTitle.innerHTML = `
                        <p class="text-red-500">${data.title}</p>
                    `;
                } if (data.description) {
                    alertDescription.innerHTML = `
                        <p class="text-red-500">${data.description}</p>
                    `;
                }
                if (data.success) {
                    alert.innerHTML = `
                        <p class="bg-green-100 p-2">${data.success}</p>
                    `;
                    setTimeout(() => {
                        window.location.href = '/super-week/books';
                    }, 1000);
                }
            });
    });
}
