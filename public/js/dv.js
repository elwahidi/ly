$(function () {
    function ht($tr, $this) {
        var $qt = $('#'+$tr+' > td[data-content="qt"]').text();
        return $.trim($qt) * $this;
    }
    function tva($tr,$ht) {
        var $tvaPourcentage = $('#'+$tr+' > td[data-content="tva"]').attr('data-target');
        return $.trim($tvaPourcentage) * $ht /100;
    }
    function ttc($ht, $tva) {
        return $ht + $tva;
    }
    var $pu = $('.pu').change(function(){
        var total = 0;
        var $this = (parseFloat($.trim(this.value)) ||0);
        var $tr = $(this).parent().parent().attr('id');
        //iterate through all the fee elements and find the total
        $pu.each(function(){
            total += (parseFloat($.trim(this.value)) ||0)
        })
        var $ht = ht($tr,$this);
        var $tva = tva($tr,$ht);
        var $ttc = ttc($ht,$tva);
        $('#'+$tr+' > td[data-content="ht"]').text($ht.toFixed(2))
        $('#'+$tr+' > td[data-content="tva"]').text($tva.toFixed(2))
        $('#'+$tr+' > td[data-content="ttc"]').text($ttc.toFixed(2))

        var $totalHt = 0;
        $('td[data-content="ht"]').each(function () {
            var $val = $(this).text();
            $totalHt += (parseFloat($.trim($val)) ||0);
        })
        var $totalTva = 0;
        $('td[data-content="tva"]').each(function () {
            var $val = $(this).text();
            $totalTva += (parseFloat($.trim($val)) ||0);
        })
        var $totalTtc = 0;
        $('td[data-content="ttc"]').each(function () {
            var $val = $(this).text();
            $totalTtc += (parseFloat($.trim($val)) ||0);
        })
        $('#ht').text($totalHt.toFixed(2))
        $('#tva').text($totalTva.toFixed(2))
        $('#ttc').text($totalTtc.toFixed(2))
        $( "#pu" ).text( total.toFixed(2) );
    });
});
