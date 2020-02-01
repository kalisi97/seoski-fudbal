<script>

    function spusti() {
        $("#chat").hide();
    }
    function generisiPitanja() {
        let nalepi = '<div>';
        nalepi += '<h1 class="text-center"> Zdravo, ja sam FutBot, i vama sam na usluzi. Kako vam mogu pomoci? </h1>';
        nalepi += '<hr>';
        nalepi += '<ul>';
        nalepi += '<li><button class="btn btn-primary" onclick="registracija()">Niste registrovani, registrujte se sada.</button></li>';
        nalepi += '<li><button class="btn btn-success" onclick="vratiTimove()">Pogledaj ko igra u nasoj ligi</button></li>';
        nalepi += '<li><button class="btn btn-info" onclick="vratiTabelu()">Tabela nase lige</button></li>';


        nalepi += '</ul>';
        nalepi += '</div>';

        $("#odgovor").html(nalepi);
    }

    generisiPitanja();

    function registracija() {
        window.location.href = "registracija.php";
    }

    function vratiTimove() {
        $.ajax({
            url : 'generisiTimove.php',
            success: function (timovi) {
                $("#odgovor").html(timovi);
            }
        })
    }

    function vratiTabelu() {
        $.ajax({
            url : 'generisiTabeluTimova.php',
            success: function (timovi) {
                $("#odgovor").html(timovi);
            }
        })
    }

</script>