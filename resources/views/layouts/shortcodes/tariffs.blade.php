            </div>
        </div>
    </div>
</main>
<section class="tariffs">
    <div class="bg__box"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Тарифы контекстной рекламы</h2>

                <div class="row">
                    <div class="tariff type-one col-4">
                        <div class="box">
                            <div class="name">
                                <p>пакет</p>
                                <p>“Самостоятельный”</p>
                            </div>
                        </div>
                        <div class="box box-bg">
                            <div class="price">от <span>5 500</span> р.</div>
                            <svg class="icon arrow_down">
                                <use xlink:href="{{ asset('img/symbols.svg#arrow_down') }}"></use>
                            </svg>
                        </div>

                        <div class="body">

                            <p>Поисковая система: Яндекс или Гугл  (для одной)</p>
                            <p>Для кого: для самостоятельного ведения рекламы</p>
                            <ul>
                                <li>Аудит Вашего сайта</li>
                                <li>Подбор целевых запросов</li>
                                <li>Группировка запросов согласно структуре сайта</li>
                                <li>Установка Яндекс.Метрики/Google Analytics</li>
                                <li>Создание индивидуального рекламного кабинета</li>
                                <li>Подбор минус-слов</li>
                                <li>Написание продающих текстов объявлений</li>
                                <li>Настройка геотаргетинга + визитка компании</li>
                                <li>Добавление быстрых ссылок</li>
                                <li>Добавление уточнений</li>
                                <li>Подбор наиболее выгодного времени показа</li>
                                <li>Отдельная кампания – отдельная стратегия</li>
                                <li>Подбор оптимальной ставки за клик для каждого запроса</li>
                                <li>Помощь в пополнении баланса рекламы</li>
                                <li>Передача доступов от рекламного кабинета</li>
                            </ul>
                            <div class="price">
                                <p>Единоразовая настройка - 5 500 руб.</p>
                            </div>
                            <div class="btn green call__popup" data-service="Самостоятельный">Заказать</div>
                        </div>
                    </div>
                    <div class="tariff type-two col-4">
                        <div class="box">
                            <div class="name">
                                <p>пакет</p>
                                <p>“Начинающий”</p>
                            </div>
                        </div>
                        <div class="box box-bg">
                            <div class="price">от <span>3 500</span> р.</div>
                        </div>
                        <div class="body">
                            <p>Поисковая система: Яндекс или Гугл (для одной)</p>
                            <p>Для кого: для тех, кто ни разу не заказывал контекстную рекламу</p>
                            <ul>
                                <li>Аудит Вашего сайта</li>
                                <li>Подбор целевых запросов</li>
                                <li>Группировка запросов согласно структуре сайта</li>
                                <li>Установка Яндекс.Метрики/Google Analytics</li>
                                <li>Подбор минус-слов</li>
                                <li>Написание продающих текстов объявлений</li>
                                <li>Настройка геотаргетинга + визитка компании</li>
                                <li>Добавление быстрых ссылок</li>
                                <li>Добавление уточнений</li>
                                <li>Подбор наиболее выгодного времени показа</li>
                                <li>Отдельная кампания – отдельная стратегия</li>
                                <li>Подбор оптимальной ставки за клик для каждого запроса</li>
                                <li>Предоставление отчета 2 раза в месяц</li>
                            </ul>
                            <div class="price">
                                <p>Настройка - 4 500 руб.</p>
                                <p>Ведение - 3 500 руб.</p>
                            </div>
                            <div class="btn green call__popup" data-service="Начинающий">Заказать</div>
                        </div>
                    </div>
                    <div class="tariff type-three col-4">
                        <div class="box">
                            <div class="name">
                                <p>пакет</p>
                                <p>“Продвинутый”</p>
                            </div>
                        </div>
                        <div class="box box-bg">
                            <div class="price">от <span>4 000</span> р.</div>
                        </div>
                        <div class="body">
                            <ul class="icon__plus">
                                <p>Пакет «Начинающий»</p>
                                <li>Настройка PCЯ для Яндекс до 20 объявлений (текст+медиа)</li>
                                <li>Настройка КМС для Google.Adwords до 20 объявлений (текст+медиа)</li>
                                <li>Настройка UTM-меток</li>
                                <li>Еженедельный отчет</li>
                            </ul>
                            <div class="price">
                                <p>Стоимость настройки - 5 000 руб.</p>
                                <p>Ведение - 4 000 руб.</p>
                                <p>Рекламный бюджет - от 10 000 руб. в месяц на одну кампанию<p>
                            </div>
                            <div class="btn green call__popup" data-service="Продвинутый">Заказать</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="popup">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="order__service-form">
                    <div class="close__box" title="Закрыть форму">
                        <svg class="icon close">
                            <use xlink:href="./img/symbols.svg#close"></use>
                        </svg>
                    </div>
                    <div class="wrap">
                        <div class="desc">
                            <div class="as__h1">Заказать услугу</div>
                            <p>Вы можете бесплатно  получить аудит вашего сайта.<br />Вас это ни к чему не обязывает.</p>
                        </div>
                        <div class="form__box">
                            <form action="{{ route('order.tariff.send') }}" class="order__service" id="order__tariff-form" method="post"onsubmit="yaCounter45495162.reachGoal('ZAKAZ'); return true">
                                @csrf
                                <div class="services__list-block single__block">
                                    <select name="tariff" id="service__field">
                                        <option value="Самостоятельный">Самостоятельный</option>
                                        <option value="Начинающий">Начинающий</option>
                                        <option value="Продвинутый">Продвинутый</option>
                                    </select>
                                    <i class="select__arrow"></i>
                                </div>
                                <div class="single__block">
                                    <input type="text" name="name" placeholder="Ваше имя" autocomplete="off">
                                </div>
                                <div class="single__block">
                                    <input type="text" name="phone" placeholder="Номер телефона" autocomplete="off">
                                </div>
                                <div class="single__block">
                                    <input type="email" name="email" placeholder="Email" autocomplete="off">
                                </div>
                                <div class="single__block submit__block">
                                    <button type="submit" class="btn">Отправить</button>
                                </div>
                                <div class="single__block agree__block">
                                    <input type="checkbox" name="agree" id="i_agree-tariff" value="1" checked>
                                    <label for="i_agree-tariff">Оставляя заявку, Вы соглашаетесь на <a href="{{ route('page.show', ['alias' => 'personal-data']) }}" target="_blank" title="Перейти на страницу описания">обработку персональных данных</a></label>
                                    <p class="error">Согласитесь на обработку персональных данных</p>
                                </div>
                            </form>
                            <!-- /.order__service -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popup__show-bg"></div>

<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
