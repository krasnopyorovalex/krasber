<div class="steps_form">
    <form action="{{ route('quiz.send') }}" id="quiz__form" onsubmit="yaCounter45495162.reachGoal('QUIZ'); return true">
        @csrf
        <ul class="steps_form-step">
            <li>
                <span>1</span>
                <svg class="icon">
                    <use xlink:href="{{ asset('img/symbols.svg#success') }}"></use>
                </svg>
                <div>тип сайта</div>
            </li>
            <li>
                <span>2</span>
                <svg class="icon">
                    <use xlink:href="{{ asset('img/symbols.svg#success') }}"></use>
                </svg>
                <div>этап работы</div>
            </li>
            <li>
                <span>3</span>
                <svg class="icon">
                    <use xlink:href="{{ asset('img/symbols.svg#success') }}"></use>
                </svg>
                <div>функционал</div>
            </li>
            <li>
                <span>4</span>
                <svg class="icon">
                    <use xlink:href="{{ asset('img/symbols.svg#success') }}"></use>
                </svg>
                <div>контакты</div>
            </li>
        </ul>
        <fieldset data-step="1" class="active">
            <input type="hidden" name="type" value="">
            <div class="title">Выберите тип сайта:</div>
            <ul>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#landing_page') }}"></use>
                    </svg>
                    <span>Landing page</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#website') }}"></use>
                    </svg>
                    <span>Корпоративный сайт</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#sajt_katalog') }}"></use>
                    </svg>
                    <span>Сайт-каталог</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#shop') }}"></use>
                    </svg>
                    <span>Интернет-магазин</span>
                </li>
            </ul>
            <div class="center other">
                <label for="other_field">Напишите свой вариант</label>
                <input type="text" id="other_field" autocomplete="off">
            </div>
            <div class="right">
                <div class="continue btn">Далее</div>
            </div>
        </fieldset>
        <fieldset data-step="2">
            <input type="hidden" name="stage" value="">
            <div class="title">На каком этапе Ваш сайт?</div>
            <ul>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#new-site') }}"></use>
                    </svg>
                    <span>Новый сайт</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#redesign') }}"></use>
                    </svg>
                    <span>Редизайн сайта</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#ready-design') }}"></use>
                    </svg>
                    <span>Свой готовый дизайн</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#new-design') }}"></use>
                    </svg>
                    <span>Разработка дизайна</span>
                </li>
            </ul>
            <div class="right">
                <div class="previous btn">Назад</div>
                <div class="continue btn">Далее</div>
            </div>
        </fieldset>
        <fieldset data-step="3" class="multiple">
            <input type="hidden" name="functional" value="Мобильная версия,Домен/хостинг">
            <div class="title">Выберите необходимый функционал:</div>
            <ul>
                <li class="active">
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#mobile-version') }}"></use>
                    </svg>
                    <span>Мобильная версия</span>
                </li>
                <li class="active">
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#domain_hosting') }}"></use>
                    </svg>
                    <span>Домен/хостинг</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#redesign') }}"></use>
                    </svg>
                    <span>Шаблонный дизайн</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#ready-design') }}"></use>
                    </svg>
                    <span>Уникальный дизайн</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#calculator') }}"></use>
                    </svg>
                    <span>Калькулятор</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#sajt_katalog') }}"></use>
                    </svg>
                    <span>Каталог товаров</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#shop') }}"></use>
                    </svg>
                    <span>Корзина</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#checklist') }}"></use>
                    </svg>
                    <span>Фильтры/поиск/сортировка</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#contact') }}"></use>
                    </svg>
                    <span>Обратный звонок</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#review') }}"></use>
                    </svg>
                    <span>Отзывы</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#quiz') }}"></use>
                    </svg>
                    <span>Форма-quiz</span>
                </li>
                <li>
                    <svg class="icon">
                        <use xlink:href="{{ asset('img/symbols.svg#registration-form') }}"></use>
                    </svg>
                    <span>Личный кабинет и регистарция</span>
                </li>
            </ul>
            <div class="right">
                <div class="previous btn">Назад</div>
                <div class="continue btn">Далее</div>
            </div>
        </fieldset>
        <fieldset data-step="4">
            <div class="title">Оставьте свои данные для связи:</div>

            <div class="row">
                <div class="col-5">
                    <div class="contacts">
                        <div class="single_block">
                            <label for="field_name">Ваше имя*:</label>
                            <input type="text" name="name" id="field_name" autocomplete="off" required minlength="3">
                        </div>
                        <div class="single_block">
                            <label for="field_email">Ваш email*:</label>
                            <input type="email" name="email" id="field_email" autocomplete="off" required>
                        </div>
                        <div class="single_block">
                            <label for="field_phone">Ваш телефон:</label>
                            <input type="text" name="phone" id="field_phone" autocomplete="off">
                        </div>
                        <div class="single__block agree__block">
                            <input type="checkbox" name="agree" id="i_agree_quiz" value="1" checked>
                            <label for="i_agree_quiz">Отправляя заяявку  вы соглашаетесь с <a href="#" title="Перейти на страницу описания">правилами офферты</a></label>
                        </div>
                        <div class="single_block submit__block">
                            <button type="submit" class="btn">Отправить</button>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="result"></div>
                </div>
            </div>
        </fieldset>
    </form>
</div>
