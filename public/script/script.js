const formAddBook = document.querySelector('#addBooksForm');
const displayAllUsers = document.querySelector('#displayAllUsers');
const displayUsers = document.querySelector('#displayUsers');
const BtnDisplayAllBooks = document.querySelector('#buttonDisplayBooks');
const displayAllBooks = document.querySelector('#displayAllBooks');
const btnSpecificUser = document.querySelector('#btnSpecificUser');
const btnSpecificBook = document.querySelector('#btnSpecificBook');
const formLogin = document.querySelector('#formLogin');
const formRegister = document.querySelector('#formRegister');

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
                displayAllBooks.classList.toggle('hidden'); // Ajoute ou supprime la classe "hidden"
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
                        <td class="border border-gray-400 px-4 py-1">${book.title}</td>
                        <td class="border border-gray-400 px-4 py-1 max-w-40p w-7/12">${book.content}</td>
                        <td class="border border-gray-400 px-4 py-1">${book.first_name} ${book.last_name}</td>
                    </tr>
                    `;
                });
            });
    });
}

if (btnSpecificUser) {
    btnSpecificUser.addEventListener('click', async (e) => {
        e.preventDefault();
        const id = document.querySelector('#user_id').value;
        if (id === '') {
            const displaySpecificUser = document.querySelector('#displaySpecificUser');
            displaySpecificUser.innerHTML = '';
            displaySpecificUser.innerHTML = `
                <p class="text-red-500">Veuillez renseigner un ID</p>
            `;
            return;
        } else {
        await fetch('/super-week/user/' + id)
            .then(res => res.json())
            .then(data => {
                const displaySpecificUser = document.querySelector('#displaySpecificUser');
                displaySpecificUser.innerHTML = '';
                if (data.error) {
                    displaySpecificUser.innerHTML = `
                        <p class="text-red-500">${data.error}</p>
                    `;
                }
                if (data.user) {
                const users = data.user;
                    displaySpecificUser.innerHTML += `
                        <div class="flex w-1/3">
                            <p class="text-gray-500">ID: ${users.id}</p>
                            <p class="text-gray-500">Prénom: ${users.first_name}</p>
                            <p class="text-gray-500">Nom: ${users.last_name}</p>
                            <p class="text-gray-500">Email: ${users.email}</p>
                        </div>
                    `;
                }
            });
        }
    });
}

if (btnSpecificBook) {
    btnSpecificBook.addEventListener('click', async (e) => {
        const id = document.querySelector('#book_id').value;
        e.preventDefault();
        if (id === '') {
            const displaySpecificBook = document.querySelector('#displaySpecificBook');
            displaySpecificBook.innerHTML = '';
            displaySpecificBook.innerHTML = `
                <p class="text-red-500">Veuillez renseigner un ID</p>
            `;
            return;
        } else {
            await fetch('/super-week/book/' + id)
                .then(res => res.json())
                .then(data => {
                    const displaySpecificBook = document.querySelector('#displaySpecificBook');
                    displaySpecificBook.innerHTML = '';
                    if (data.error) {
                        displaySpecificBook.innerHTML = `
                        <p class="text-red-500">${data.error}</p>
                    `;
                    }
                    if (data.book) {
                        const book = data.book;
                        const titlePage = document.querySelector('title');
                        const h1Page = document.querySelector('#livreTitle');
                        titlePage.innerHTML = '';
                        h1Page.innerHTML = '';
                        titlePage.innerHTML = `Livre: ${book.title}`;
                        h1Page.innerHTML = `Livre: ${book.title}`;
                        displaySpecificBook.innerHTML = `
                        <table class="border border-gray-400">
                            <thead class="bg-gray-200">
                            <tr>
                                <th class="border border-gray-400 px-4 py-2">Titre</th>
                                <th class="border border-gray-400 px-4 py-2">Contenu</th>
                                <th class="border border-gray-400 px-4 py-2">Ajouté par</th>
                            </tr>
                            </thead>
                            <tbody id="tbodyBook">
                            </tbody>
                        </table>
                        `;
                        const tbodyBook = document.querySelector('#tbodyBook');
                        tbodyBook.innerHTML += `
                        <tr>
                            <td class="border border-gray-400 px-4 py-2">${book.title}</td>
                            <td class="border border-gray-400 px-4 py-2 max-w-40p w-7/12">${book.content}</td>
                            <td class="border border-gray-400 px-4 py-2">${book.first_name} ${book.last_name}</td>
                        </tr>
                    `;
                    }
                });
        }
    });
}
if (formLogin) {
    formLogin.addEventListener('submit', async (e) => {
        e.preventDefault();
        await fetch('/super-week/login', {
            method: 'POST',
            body: new FormData(formLogin)
        })
            .then(res => res.json())
            .then(data => {
                console.log(data);
                const smallEmail = document.querySelector('#errorEmail');
                const smallPassword = document.querySelector('#errorPassword');
                const Alert = document.querySelector('#alertMessage');
                if (data.email){
                    smallEmail.innerHTML = '';
                    smallEmail.innerHTML = data.email;
                }
                if (data.password){
                    smallPassword.innerHTML = '';
                    smallPassword.innerHTML = data.password;
                }
                if (data.error){
                    Alert.innerHTML = '';
                    Alert.innerHTML = `
                        <p class="text-red-500 p-2 border-2 border-red-500 bg-red-500 bg-opacity-10 rounded">${data.error}</p>
                    `;
                }
                if (data.success){
                    Alert.innerHTML = '';
                    Alert.innerHTML = `
                        <p class="text-green-500 p-2 border-2 border-green-500 bg-green-500 bg-opacity-10 rounded">${data.success}</p>
                        `;
                    setTimeout(() => {
                        window.location.replace('/super-week');
                    } , 2500);
                }
            });
    });
}
// Register
function alertSmall(data, selector) {
    if (data) {
        selector.innerHTML = '';
        selector.innerHTML = data;
    }
}
if (formRegister) {
    formRegister.addEventListener('submit', async (e) => {
        e.preventDefault();
        await fetch('/super-week/register', {
            method: 'POST',
            body: new FormData(formRegister)
        })
            .then(res => res.json())
            .then(data => {
                console.log(data);
                const smallFirstName = document.querySelector('#errorfName');
                const smallLastName = document.querySelector('#errorlName');
                const smallEmail = document.querySelector('#errorEmail');
                const smallPassword = document.querySelector('#errorPassword');
                const smallPasswordConfirm = document.querySelector('#errorC_Password');
                const Alert = document.querySelector('#alertError');

                alertSmall(data.fname, smallFirstName);
                alertSmall(data.lname, smallLastName);
                alertSmall(data.email, smallEmail);
                alertSmall(data.password, smallPassword);
                alertSmall(data.c_password, smallPasswordConfirm);
                if (data.error) {
                    Alert.innerHTML = '';
                    Alert.innerHTML = `
                        <p class="text-red-500 p-2 border-2 border-red-500 bg-red-500 bg-opacity-10 rounded">${data.error}</p>
                    `;
                }
                if (data.success) {
                    Alert.innerHTML = '';
                    Alert.innerHTML = `
                    <p class="text-green-500 p-2 border-2 border-green-500 bg-green-500 bg-opacity-10 rounded">${data.success}</p>
                    `;
                }
                });
            });
}


