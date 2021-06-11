const bot_form = document.querySelector('.bot-form')
const bot_show = document.querySelector('.show-bot')
const bot_input = document.querySelector(".bot-input")
const bot_btn = document.querySelector(".bot-btn")
const bot_content = document.querySelector(".bot-content")
const bot_close = document.querySelector('.close-bot')
function enterMessage(evt) {
    let message = document.createElement('div')
    if (bot_input.value == "") {
        return false
    } else {
        message.innerHTML = `${bot_input.value}`
        message.classList.add('bot-message')
        message.style.float = 'right'
        message.style.borderBottomRightRadius = '0px'
        message.style.borderBottomLeftRadius = '12px'
        bot_content.appendChild(message)
        bot_content.scrollTo(0, bot_content.scrollHeight)
        bot_input.value = ""
        setTimeout(function () {
            const answer = document.createElement('div')
            function createAnswer(text){
                answer.innerHTML = text
                answer.classList.add('bot-message')
                bot_content.appendChild(answer)
                bot_content.scrollTo(0, bot_content.scrollHeight)
            }
            switch (message.innerHTML) {
                case `1`:
                    createAnswer(`Мы можем вам помочь!`)
                    return
                case `2`:
                    createAnswer(`Мы не можем вам помочь! Простите(`)
                    return
                case `Ты чёрт`:
                    createAnswer(`Сам ты чёрт`)
                    return
                default:
                    createAnswer(`Я не был готов, к такому.`)
                    return
            }
        }, 200)
    }
}
bot_input.addEventListener('keydown', function (event) {
    if (event.keyCode == 13) {
        event.preventDefault();
        enterMessage()
    }
});
const forShowTimeoutClose = () => { bot_show.style.right = '100px' }
const forShowTimeoutShow = () => { bot_form.style.bottom = '0px' }
bot_close.addEventListener('click', function (evt) {
    bot_form.style.bottom = '-480px'
    setTimeout(forShowTimeoutClose, 500)

})
bot_show.addEventListener('click', function (evt) {

    bot_show.style.right = '-100px'
    setTimeout(forShowTimeoutShow, 1000)


})
bot_btn.addEventListener('click', enterMessage)
window.addEventListener('load', function(evt){
    setTimeout(forShowTimeoutShow, 7000)
})
