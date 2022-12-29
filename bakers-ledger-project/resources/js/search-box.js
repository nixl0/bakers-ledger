const ledgerSearchValueInput = document.querySelector('.ledger-search-value-input')
const ledgerSearchIdInput = document.querySelector('.ledger-search-id-input')
const ledgerSearchDropdown = document.querySelector('.ledger-search-dropdown')
const ledgerSearchLi = document.querySelectorAll('.ledger-search-li')

// on input click toggle dropdown
ledgerSearchValueInput.addEventListener('click', () => {
    ledgerSearchDropdown.classList.toggle('hidden')
})

// on li click toggle selection
ledgerSearchLi.forEach((li) => {
    li.addEventListener('click', (e) => {
        const liValue = e.target.value

        ledgerSearchIdInput.value = liValue

        ledgerSearchValueInput.value = li.textContent
    })
})

// on ledgerSearchValueInput input toggle list values
ledgerSearchValueInput.addEventListener('input', (e) => {
    const userValue = e.target.value

    ledgerSearchLi.forEach((li) => {
        const liValue = li.textContent.toLowerCase()

        if (!liValue.includes(userValue)) {
            li.classList.add('hidden')
        }
        else {
            li.classList.remove('hidden')
        }
    })
})

// ledgerSearchIdInput.addEventListener('input', (e) => {
//     const givenId = e.target.value

//     ledgerSearchLi.forEach((li) => {
//         const matchingId = li.getAttribute('value')

//         if (givenId === matchingId) {
//             ledgerSearchValueInput.value = li.textContent
//         }
//     })
// })
