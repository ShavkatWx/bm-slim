const deleteProjectCheck = document.querySelectorAll('.delete-project-check')
const deleteProjectModal = document.querySelectorAll('.delete-project-modal')

deleteProjectCheck.forEach((item, id) => {
    item.addEventListener('click', () => {
        deleteProjectModal[id].classList.toggle('open-modal')
    })
})

