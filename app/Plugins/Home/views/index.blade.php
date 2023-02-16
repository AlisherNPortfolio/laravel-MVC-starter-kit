@extends('front.layouts.main')

@section('content')
    <main class="main">
        <section class="section backdrop-color product-for-users">
            <div class="my-container">
                <div class="section__top">
                    <h2 class="section__title">Продукты для <b class="bold-text">пользователей</b></h2>
                </div>
                <div class="section__wrap section__grid">
                    <div class="section__item">
                        <div class="section__item-logo">
                            <img src="{{ asset('img/svg/myuzcard-white.svg') }}" alt="">
                        </div>
                        <div class="section__item-content">
                            <h3 class="section__item-title">
                                My Uzcard
                            </h3>
                            <p class="section__item-text">Платежное приложение, посредством которого можно управлять пластиковой картой в режиме онлайн</p>

                            <h2 class="section__item-backdrop">
                                MyUzcard
                            </h2>
                            <a href="#!" class="main-btn product__btn waves-ripple waves-effect">Подробнее</a>
                        </div>
                    </div>

                    <div class="section__item">
                        <div class="section__item-logo">
                            <img src="{{ asset('img/svg/uzcardtrade-white.svg') }}" alt="">
                        </div>
                        <div class="section__item-content">
                            <h3 class="section__item-title">
                                Uzcard Trade
                            </h3>
                            <p class="section__item-text">Электронный магазин для юр. лиц. Оплата за товары и услуги проводится через корпоративную карту</p>
                            <h2 class="section__item-backdrop">
                                Uzcard Trade
                            </h2>
                            <a href="#!" class="main-btn product__btn waves-ripple waves-effect">Подробнее</a>
                        </div>
                    </div>

                    <div class="section__item">
                        <div class="section__item-logo">
                            <img src="{{ asset('img/svg/edo-white.svg') }}" alt="">
                        </div>
                        <div class="section__item-content">
                            <h3 class="section__item-title">
                                Edo.uzcardtrade.uz
                            </h3>
                            <p class="section__item-text">Модуль для формирования эл. документов, которые оформляются ЭЦП юр.лиц</p>
                            <h2 class="section__item-backdrop">
                                Edo
                            </h2>
                            <a href="#!" class="main-btn product__btn waves-ripple waves-effect">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section backdrop-color pb-0">
            <div class="my-container">
                <div class="section__top">
                    <h2 class="section__title">Последние <b class="bold-text">новости</b></h2>
                </div>
                <div class="section__wrap">
                    <div class="owl-carousel owl-theme news__slider card">
                        <a href="#!" class="item card__item">
                            <div class="card__photo">
                                <img src="{{ asset('img/card-1.jpg') }}" alt="">
                            </div>
                            <div class="card__content">
                                <div class="card__title">Возможность принимать электронные платежи</div>
                                <div class="card__text">
                                    Внезапно, некоторые особенности внутренней политики могут быть ограничены исключительно образом мышления.
                                </div>
                            </div>

                        </a>

                        <a href="#!" class="item card__item">

                            <div class="card__photo">
                                <img src="{{ asset('img/card-2.jpg') }}" alt="">
                            </div>
                            <div class="card__content">
                                <div class="card__title">Формирование электронных счет-фактур</div>

                                <div class="card__text">
                                    Таким образом, перспективное планирование играет определяющее значение для новых предложений.
                                </div>
                            </div>

                        </a>
                        <a href="#!" class="item card__item">
                            <div class="card__photo">
                                <img src="{{ asset('img/card-3.jpg') }}" alt="">
                            </div>
                            <div class="card__content">
                                <div class="card__title">Проведение скоринга пластиковых карт</div>
                                <div class="card__text">
                                    Убеждённость некоторых оппонентов однозначно фиксирует необходимость системы массового участия.
                                </div>
                            </div>

                        </a>

                        <a href="#!" class="item card__item">
                            <div class="card__photo">
                                <img src="{{ asset('img/card-1.jpg') }}" alt="">
                            </div>
                            <div class="card__content">
                                <div class="card__title">Возможность принимать электронные платежи</div>
                                <div class="card__text">
                                    Внезапно, некоторые особенности внутренней политики могут быть ограничены исключительно образом мышления.
                                </div>
                            </div>
                        </a>

                        <a href="#!" class="item card__item">
                            <div class="card__photo">
                                <img src="{{ asset('img/card-2.jpg') }}" alt="">
                            </div>
                            <div class="card__content">
                                <div class="card__title">Формирование электронных счет-фактур</div>
                                <div class="card__text">
                                    Таким образом, перспективное планирование играет определяющее значение для новых предложений.
                                </div>
                            </div>

                        </a>

                        <a href="#!" class="item card__item">
                            <div class="card__photo">
                                <img src="{{ asset('img/card-3.jpg') }}" alt="">
                            </div>
                            <div class="card__content">
                                <div class="card__title">Проведение скоринга пластиковых карт</div>
                                <div class="card__text">
                                    Убеждённость некоторых оппонентов однозначно фиксирует необходимость системы массового участия.
                                </div>
                            </div>

                        </a>
                        <a href="#!" class="item card__item">
                            <div class="card__photo">
                                <img src="{{ asset('img/card-1.jpg') }}" alt="">
                            </div>
                            <div class="card__content">
                                <div class="card__title">Возможность принимать электронные платежи</div>
                                <div class="card__text">
                                    Внезапно, некоторые особенности внутренней политики могут быть ограничены исключительно образом мышления.
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="item card__item">
                            <div class="card__photo">
                                <img src="{{ asset('img/card-2.jpg') }}" alt="">
                            </div>
                            <div class="card__content">
                                <div class="card__title">Формирование электронных счет-фактур</div>

                                <div class="card__text">
                                    Таким образом, перспективное планирование играет определяющее значение для новых предложений.
                                </div>
                            </div>
                        </a>

                        <a href="#!" class="item card__item">
                            <div class="card__photo">
                                <img src="{{ asset('img/card-3.jpg') }}" alt="">
                            </div>
                            <div class="card__content">
                                <div class="card__title">Проведение скоринга пластиковых карт</div>
                                <div class="card__text">
                                    Убеждённость некоторых оппонентов однозначно фиксирует необходимость системы массового участия.
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="my-container">
                <div class="section__wrap mt-0  contacts__info">
                    <div class="partners">
                        <h2 class="section__title tal">Наши <b class="bold-text">партнеры</b></h2>
                        <div class="partners__wrap">
                            <div class="partners__item">
                                <img src="{{ asset('img/png/kapitalbank.png') }}" alt="">
                            </div>
                            <div class="partners__item">
                                <img src="{{ asset('img/png/ofb.png') }}" alt="">
                            </div>
                            <div class="partners__item">
                                <img src="{{ asset('img/png/hamkorbank.png') }}" alt="">
                            </div>
                            <div class="partners__item">
                                <img src="{{ asset('img/png/qqb.png') }}" alt="">
                            </div>
                            <div class="partners__item">
                                <img src="{{ asset('img/png/paynet.png') }}" alt="">
                            </div>
                            <div class="partners__item">
                                <img src="{{ asset('img/png/sqb.png') }}" alt="">
                            </div>
                        </div>

                    </div>

                    <div class="feedback">
                        <div class="feedback__inner">
                            <h2 class="feedback__title">Не нашли, что искали?</h2>
                            <small class="feedback__subtitle">Свяжитесь с нами, мы вас прокосультируем</small>

                            <form action="" class="feedback__wrap">
                                <div class="form__group feedback__item">
                                    <label for="name">Ваше имя</label>
                                    <input type="text" id="name">
                                </div>
                                <div class="form__group feedback__item">
                                    <label for="email">Электронная почта</label>
                                    <input type="email" id="email">
                                </div>
                                <div class="form__group feedback__item">
                                    <label for="phone">Телефон (не обязательно)</label>
                                    <input type="text" class="phone-musk" id="phone">
                                </div>
                                <div class="form__group feedback__item">
                                    <label for="message">Ваше сообщение</label>
                                    <textarea name="" id="" cols="20" rows="10" id="message"></textarea>
                                </div>
                            </form>
                            <div class="feedback__bottom">
                                <a href="#!" class="main-btn">Отправить</a>
                                <h6>
                                    Нажимая отправить, вы соглашаетесь с
                                    <br>
                                    <a href="#!">политикой конфиденциальности</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


    </main>
@endsection
