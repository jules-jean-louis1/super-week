const formAddBook = document.querySelector('#addBooksForm');
const displayAllUsers = document.querySelector('#displayAllUsers');
const displayUsers = document.querySelector('#displayUsers');
const BtnDisplayAllBooks = document.querySelector('#buttonDisplayBooks');
const displayAllBooks = document.querySelector('#displayAllBooks');

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
if (BtnDisplayAllBooks) {
    BtnDisplayAllBooks.addEventListener('click', (e) => {
        e.preventDefault();
        fetch('/super-week/books/all/')
            .then(res => res.json())
            .then(data => {
                // Supprimer la classe "hidden" pour afficher la liste des livres
                displayAllBooks.classList.remove('hidden');
                displayAllBooks.innerHTML = '';
                displayAllBooks.innerHTML = `
                <table class="border border-gray-400">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-gray-400 px-4 py-2">Titre</th>
                        <th class="border border-gray-400 px-4 py-2">Contenu</th>
                        <th class="border border-gray-400 px-4 py-2">Ajouté par</th>
                    </tr>
                    </thead>
                    <tbody id="containerBooks">
                    </tbody>
                </table
                `;
                const AllBooks = document.querySelector('#containerBooks');
                data.forEach(book => {
                    AllBooks.innerHTML += `
                    <tr>
                        <td class="border border-gray-400 px-4 py-2">${book.title}</td>
                        <td class="border border-gray-400 px-4 py-2 max-w-40p w-7/12">${book.content}</td>
                        <td class="border border-gray-400 px-4 py-2">${book.first_name} ${book.last_name}</td>
                    </tr>
                    `;
                });
            });
        // Ajouter la classe "hidden" pour masquer la liste des livres
        displayAllBooks.classList.add('hidden');
    });
}


