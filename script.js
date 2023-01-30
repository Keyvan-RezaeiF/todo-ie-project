const defaultCategories = [
  {
    title: 'All',
    id: 0,
  },
  {
    title: 'Remained',
    id: 1,
  },
  {
    title: 'Finished',
    id: 2,
  },
]

let currentFilter = 0
const filterByCategory = (catagoryID) => {
  todosContainer.innerHTML = '';
  currentFilter = catagoryID

  if (catagoryID === 0) {
    todosContainer.insertAdjacentHTML('afterbegin', todosMaker(todos))
  } else if (catagoryID === 1) {
    filtered = todos.filter(fakeTodo => fakeTodo.done_status === '0')
    todosContainer.insertAdjacentHTML('afterbegin', todosMaker(filtered))
  } else if (catagoryID === 2) {
    filtered = todos.filter(fakeTodo => fakeTodo.done_status === '1')
    todosContainer.insertAdjacentHTML('afterbegin', todosMaker(filtered))
  } else {
    filtered = todos.filter(fakeTodo => fakeTodo.catagoryID === catagoryID.toString())
    todosContainer.insertAdjacentHTML('afterbegin', todosMaker(filtered))
  }
}

const checkHandler = (event,id) =>{
  if(event.checked){
    const date = new Date()
    todos = [
      ...todos.filter(todo => todo.id!=id),
      {
        ...todos.find(todo => todo.id==id),
        done_status: event.checked,
        endDate: date.getTime(),
      }
    ]
  }
  else{
    todos = [
      ...todos.filter(todo => todo.id!=id),
      {
        ...todos.find(todo => todo.id==id),
        done_status: event.checked,
        endDate: null,
      }
    ]
  }
  filterByCategory(currentFilter)
}

const deleteHandler = (id) => {
  todos = todos.filter(item => item.id != id)
  filterByCategory(currentFilter)
}

const todosMaker = (items) => {
  if (items.length === 0) return "<h2 style='text-align: center;'>There is no Task!<br/>You're free! :)</h2>"
  let madeTodos = ''
  for (let item of items) {
    const catagoryName = categories.find(category => category.catagoryID === item.catagoryID).title

    madeTodos += `
      <div class="todo-item">
        <div class="task-desc">
          <span class="start-date">start date: ${(new Date(item.start_time)).toDateString()}</span>
          ${item.due_time?`<span class="end-date">end date: ${(new Date(item.due_time)).toDateString()}</span>`:''}
          <span class="category">${catagoryName}</span>
          <h3 class="title">${item.title}</h3>
        </div>
        <div class="task-options">

        <span class="delete">
          <a href='./php/delete_task.php?id=${item.taskID}'>
            <svg onclick="deleteHandler(${item.taskID})" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.79167 2.16667C3.79167 1.56836 4.27669 1.08334 4.875 1.08334H8.125C8.72331 1.08334 9.20833 1.56836 9.20833 2.16667V3.25H10.2861C10.2894 3.24997 10.2928 3.24997 10.2961 3.25H11.375C11.6742 3.25 11.9167 3.49252 11.9167 3.79167C11.9167 4.09082 11.6742 4.33334 11.375 4.33334H10.796L10.3262 10.9105C10.2857 11.4774 9.814 11.9167 9.24564 11.9167H3.75435C3.186 11.9167 2.71427 11.4774 2.67377 10.9105L2.20398 4.33334H1.625C1.32584 4.33334 1.08333 4.09082 1.08333 3.79167C1.08333 3.49252 1.32584 3.25 1.625 3.25H2.70386C2.70722 3.24997 2.71057 3.24997 2.71392 3.25H3.79167V2.16667ZM4.875 3.25H8.125V2.16667H4.875V3.25ZM3.29007 4.33334L3.75435 10.8333H9.24564L9.70993 4.33334H3.29007ZM5.41667 5.41667C5.71582 5.41667 5.95833 5.65918 5.95833 5.95834V9.20834C5.95833 9.50749 5.71582 9.75 5.41667 9.75C5.11751 9.75 4.875 9.50749 4.875 9.20834V5.95834C4.875 5.65918 5.11751 5.41667 5.41667 5.41667ZM7.58333 5.41667C7.88249 5.41667 8.125 5.65918 8.125 5.95834V9.20834C8.125 9.50749 7.88249 9.75 7.58333 9.75C7.28418 9.75 7.04167 9.50749 7.04167 9.20834V5.95834C7.04167 5.65918 7.28418 5.41667 7.58333 5.41667Z" fill="#616161"/>
            </svg>
          </a>
        </span>

        <span>
          <a style='text-decoration: none; color: black;' href='./php/update_status.php?id=${item.taskID}&status=${item.done_status}'>
            <input ${item.done_status === '1' ? 'checked' : ''} onclick="window.location.replace('./php/update_status.php?id=${item.taskID}&status=${item.done_status}')" type="checkbox" id="isDone" name="isDone" value="isDone">
            <label for="isDone">Is done</label>
          </a>
        </span>

        </div>
      </div>
    `
  }

  return madeTodos
}

const categoriesMaker = (categories) => {
  let madeCategories = ''

  for (category of defaultCategories) {
    madeCategories += `
      <span class='category' onclick='filterByCategory(${category.id})'>
        ${category.title}
      </span>
    `;
  }

  for (category of categories) {
    madeCategories += `
      <span class='category' onclick='filterByCategory(${category.catagoryID})'>
        ${category.title}
      </span>
    `;
  }

  madeCategories += `
    <span class='category' style='color: white; background-color: rgb(35, 53, 220);' onclick='window.location.replace("./php/add_category.php")'>
      +
    </span>
  `
  return madeCategories
}

const fakeTodos = document.querySelector('#fetched-tasks')
const fakeCatagories = document.querySelector('#fetched-categories')
const todos = JSON.parse(fakeTodos.textContent)
const categories = JSON.parse(fakeCatagories.textContent)

const todosContainer = document.querySelector('.todos-container')
todosContainer.insertAdjacentHTML('afterbegin', todosMaker(todos))

if (todos.length) {
  const categoriesContainer = document.querySelector('.categories-container')
  categoriesContainer.insertAdjacentHTML('afterbegin', categoriesMaker(categories))
}

const submitForm = (event) => {
  event.preventDefault();
  let title = document.getElementById('task').value
  let category = document.getElementById('categories').value

  let date = new Date()
  let newTodo = {
    done_status: false,
    startDate: date.getTime(),
    endDate: null,
    id: todos.length!==0 ? ((todos[todos.length - 1].id) + 1) : 0,
    title,
    categoryName: category,
  }

  todos.push(newTodo)

  filterByCategory(currentFilter)
}


if (!localStorage.getItem('hasShownNotif')) {
  localStorage.setItem('hasShownNotif', false)
}

const checkForTodaysTasks = () => {
  console.log('here')

  const today = new Date()
  for (let todo of todos) {
    const taskDay = new Date(todo.due_time)

    if (taskDay.toDateString() === today.toDateString()) {
      alert(`You have a task with the title of "${todo.title}" today!`)
    }
  }

  localStorage.setItem('hasShownNotif', true)
}

console.log(localStorage.getItem('hasShownNotif'));
if (localStorage.getItem('hasShownNotif') === 'false') {
  setTimeout(() => checkForTodaysTasks(), 1000);
}