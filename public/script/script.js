const formAddBook = document.querySelector('#addBooksForm');
const displayAllUsers = document.querySelector('#displayAllUsers');
const displayUsers = document.querySelector('#displayUsers');

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
if (displayAllUsers) {
    displayAllUsers.addEventListener('click', (e) => {
        e.preventDefault();
        fetch('/super-week/users/all/')
            .then(res => res.json())
            .then(data => {
                displayUsers.innerHTML = '';
                data.forEach(user => {
                    displayUsers.innerHTML += `
            <div class="flex w-1/3">
              <div class="w-full">
                <div class="bg-gray-100 p-2 m-2">
                  <p class="text-gray-500">ID: ${user.id}</p>
                  <p class="text-gray-500">Prénom: ${user.first_name}</p>
                  <p class="text-gray-500">Nom: ${user.last_name}</p>
                  <p class="text-gray-500">Email: ${user.email}</p>
                </div>
              </div>
            </div>
          `;
                });
            });
        displayUsers.innerHTML = '';
    });
}

