const viewModal = document.getElementsByClassName('viewModal')
const checkModal = document.getElementById('checkModal')
const overlay = document.getElementById('overlay')

Array.from(viewModal).forEach(el => {
    el.addEventListener('click', (e) => {
        e.preventDefault()
        checkModal.style.transform = 'scale(1, 1)'
        window.scrollTo({
            top: 5,
            behavior: 'smooth'
        })
    })
})

overlay.addEventListener('click', () => checkModal.style.transform = 'scale(0, 0)')