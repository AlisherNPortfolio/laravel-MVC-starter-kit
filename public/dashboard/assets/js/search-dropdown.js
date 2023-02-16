(function ($) {
    let searchBlock = $('.search__dropdown');
    let neighborInput = searchBlock.parent().find('input');
    let width = neighborInput.css('width');
    neighborInput.css('position', 'relative');
    searchBlock.css('width', width);
})(jQuery)
function search_dropdown(url, csrf, lang) {
    (function ($) {
        $('#search-dropdown').keyup(function (e) {
            let search = e.target.value;
            if (search !== '') {
                $.ajax({
                    url: '/admin/' + url,
                    type: 'GET',
                    data: {
                        _token: csrf,
                        search: search
                    },
                    success: function (res) {
                        if (res.length > 0) {
                            generateList(res);
                        }
                        $('.search__dropdown').fadeIn(1);
                    },
                    error: function (err) {
                        console.error(err);
                    }
                })
            } else {
                $('.search__dropdown').fadeOut(1);
            }
        });
    })(jQuery);
}

function generateList(listData) {
    (function ($) {
        let itemList = '<ul>';
        listData.forEach(value => {
            itemList += '<li class="search__dropdown-item">' + value + '</li>';
        });
        itemList += '</ul>';
        $('.search__dropdown').html(itemList);
    })(jQuery)
}
