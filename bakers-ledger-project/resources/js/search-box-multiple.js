const ledgerMultipleContainerS = document.querySelectorAll('.ledger-multiple-container')

ledgerMultipleContainerS.forEach(ledgerMultipleContainer => {
    const ledgerMultipleValueInput = ledgerMultipleContainer.querySelector('.ledger-multiple-value-input')
    const ledgerMultipleIdInput = ledgerMultipleContainer.querySelector('.ledger-multiple-id-input')
    const ledgerMultipleDropdown = ledgerMultipleContainer.querySelector('.ledger-multiple-dropdown')
    const ledgerMultipleLiS = ledgerMultipleContainer.querySelectorAll('.ledger-multiple-li')
    const ledgerMultipleSelected = ledgerMultipleContainer.querySelector('.ledger-multiple-selected')

    // TODO parse ids on page load
    // on window load, select textcontent of li by the given id in ledgerMultipleIdInput
    window.addEventListener('load', () => {
        const savedId = ledgerMultipleIdInput.value

        console.log(savedId)

        // ledgerMultipleLiS.forEach(li => {
        //     if (li.value == savedId) {
        //         const p = document.createElement('p')
        //         const node = document.createTextNode(`${li.textContent}`)
        //         p.appendChild(node)
        //         ledgerMultipleSelected.appendChild(p)
        //     }
        // })
    })

    // on input click toggle dropdown
    ledgerMultipleValueInput.addEventListener('click', () => {
        ledgerMultipleDropdown.classList.toggle('hidden')
    })

    // on li click toggle selection
    ledgerMultipleLiS.forEach((li) => {
        li.addEventListener('click', () => {
            const liId = li.getAttribute('value')
            const liValue = li.textContent
            const idInput = ledgerMultipleIdInput.getAttribute('value')

            if (liId != null) {

                if (li.classList.contains('ledger-selected')) { // when li is selected
                    li.classList.remove('ledger-selected')
                    li.classList.remove('bg-slate-200')

                    ledgerMultipleIdInput.setAttribute('value', idInput.replace(`${liId},`, ''))

                    const ps = ledgerMultipleSelected.querySelectorAll('p')
                    ps.forEach(p => {
                        if (p.textContent == liValue) {
                            p.remove()
                        }
                    })
                }
                else { // when li is NOT selected
                    li.classList.add('ledger-selected')
                    li.classList.add('bg-slate-200')

                    ledgerMultipleIdInput.setAttribute('value', `${idInput}${liId},`)

                    const p = document.createElement('p')
                    const node = document.createTextNode(`${liValue}`)
                    p.appendChild(node)
                    ledgerMultipleSelected.appendChild(p)
                }
            }
            else {
                ledgerMultipleValueInput.value = 'ошибка. попробуйте ещё раз'
            }
        })
    })

    // on ledgerMultipleValueInput input toggle list values
    ledgerMultipleValueInput.addEventListener('input', (e) => {
        const userValue = e.target.value

        ledgerMultipleLiS.forEach((li) => {
            const liValue = li.textContent.toLowerCase()

            if (!liValue.includes(userValue)) {
                li.classList.add('hidden')
            }
            else {
                li.classList.remove('hidden')
            }
        })
    })
})
