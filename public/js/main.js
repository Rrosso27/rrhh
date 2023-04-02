
// modal
const openModal = document.querySelector('#cta')
const modalElement = document.querySelector('.modal')
const closeModal = document.querySelector('.modal_close')

const modal = () => {
    openModal.addEventListener('click', (e) => {
        e.preventDefault
        modalElement.classList.add('modal--show')
    })

    closeModal.addEventListener('click', (e) => {
        e.preventDefault
        modalElement.classList.remove('modal--show')
    })
}
modal()
// modal



