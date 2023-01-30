const fillCategories = () => {
  const categoriesoptions = document.getElementById('categories')

  for (category of categories){
    let str = `
      <option value='${category.catagoryID}'>${category.title}</option>
    `
    categoriesoptions.insertAdjacentHTML('afterbegin', str)
  }
}

const fakeCatagories = document.querySelector('#fetched-categories')
const categories = JSON.parse(fakeCatagories.textContent)
console.log(categories)

fillCategories()
// let form = document.getElementById('form')
// form.addEventListener('submit', submitForm);

localStorage.setItem('hasShownNotif', false)