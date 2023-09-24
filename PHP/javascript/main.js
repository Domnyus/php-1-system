function deposit()
{
    if(document.querySelector("#v-deposit").classList == 'd-none')
        document.querySelector("#v-deposit").classList.remove('d-none')

    document.querySelector("#v-withdraw").classList.add('d-none')
    document.querySelector("#d-value").classList.remove('d-none')
}

function withdraw()
{
    if(document.querySelector("#v-withdraw").classList == 'd-none')
        document.querySelector("#v-withdraw").classList.remove('d-none')

    document.querySelector("#v-deposit").classList.add('d-none')
    document.querySelector("#d-value").classList.remove('d-none')
}

