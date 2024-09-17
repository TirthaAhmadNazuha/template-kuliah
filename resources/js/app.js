document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('*[toggle]').forEach((elem) => {
    elem.addEventListener('click', () => {
      const effect = elem.getAttribute('toggle')
      document.querySelectorAll(`*[toggle-effect="${effect}"]`).forEach((effectElem) => {
        if (effectElem.ariaSelected) {
          effectElem.ariaSelected = null
        } else {
          effectElem.ariaSelected = true
        }
      })
    })
  })

  document.querySelectorAll('input[search-table]').forEach((inp) => {
    const effect = inp.getAttribute('search-table')
    const trs = document.querySelectorAll(`table[search-table-effect="${effect}"] tbody tr`)
    inp.addEventListener('keyup', () => {
      const val = inp.value
      if (val.length) {
        trs.forEach((tr) => {
          if (tr.textContent.includes(val)) {
            tr.classList.remove('hidden')
          } else tr.classList.add('hidden')
        })
      } else {
        trs.forEach(tr => tr.classList.remove('hidden'))
      }
    })
  })
})
