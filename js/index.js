const body = document.querySelector('body')
const scrollBar = document.getElementById('scroll')

const nav = document.getElementById('nav')
const dropdown = document.getElementById('dropdown')
const navTargets = document.getElementById('navTargets')

const container = document.getElementById('container')
const bioHead = document.getElementsByClassName('bioHead')

window.addEventListener('scroll', () => {
    if (window.pageYOffset > container.scrollHeight) {
        nav.style.backgroundColor = 'black'
        scrollBar.style.visibility = 'visible'
    } else {
        nav.style.backgroundColor = '#00000152'
        scrollBar.style.visibility = 'hidden'
    }
})

scrollBar.addEventListener('click', () => {
    body.scrollIntoView(true)
})

let openBar = false
dropdown.addEventListener('click', () => {
    if (openBar) {
        openBar = !openBar
        navTargets.style.top = '0vh'
        navTargets.style.transform = 'translateY(-100%)'
    } else {
        openBar = !openBar
        navTargets.style.top = '10vh'
        navTargets.style.transform = 'translateY(10%)'
        navTargets.style.transform = 'translateY(0%)'
    }
})

function removeActive(id) {
    const bio1 = document.getElementById('bio1')
    const bio2 = document.getElementById('bio2')
    const bio3 = document.getElementById('bio3')

    const bioText1 = document.getElementById('bioText1')
    const bioText2 = document.getElementById('bioText2')
    const bioText3 = document.getElementById('bioText3')

    switch (id) {
        case 'bio1':
            bio2.classList.remove('active')
            bio3.classList.remove('active')

            bioText1.classList.add('activeText')
            bioText2.classList.remove('activeText')
            bioText3.classList.remove('activeText')
            break;
        case 'bio2':
            bio1.classList.remove('active')
            bio3.classList.remove('active')

            bioText1.classList.remove('activeText')
            bioText2.classList.add('activeText')
            bioText3.classList.remove('activeText')
            break;
        case 'bio3':
            bio1.classList.remove('active')
            bio2.classList.remove('active')

            bioText1.classList.remove('activeText')
            bioText2.classList.remove('activeText')
            bioText3.classList.add('activeText')
            break;

        default:
            break;
    }
}

Array.from(bioHead).forEach(el => {
    el.addEventListener('click', () => {
        if (el.classList.contains('active')) {
            return null
        } else {
            removeActive(el.id)
            el.classList.add('active')
        }
    })
})
