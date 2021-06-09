function link_to_change_pass() {
	const form = '<form action="change_check.php" method="post" class="form form--change-pass">\n' +
		'            <h1 class="form__title form__title--change-pass">Смена пароля</h1>\n' +
		'            <div class="form__box">\n' +
		'                <input type="password" name="old_password" placeholder="Старый пароль:" class="form__input">\n' +
		'                <input type="password" name="new_password" placeholder="Новый пароль:" class="form__input">\n' +
		'                <button type="submit" class="form__btn">Сменить</button>\n' +
		'            </div>\n' +
		'        </form>'

	const div = document.getElementsByClassName("prof__right_bottom")[0]
	div.innerHTML = form
}