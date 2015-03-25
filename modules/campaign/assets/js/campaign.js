jQuery(document).ready(function() {
    $(".check-all").click(function(){
        var two = $("table td input[type=checkbox]").attr('checked', $(this).is(':checked'));
        $.uniform.update(two);
    });
   $("#budget").TouchSpin({          
        buttondown_class: 'btn green',
        buttonup_class: 'btn green',
        min: 20,
        step: 5,
        max: 1000000000,
        stepinterval: 300,
        maxboostedstep: 10000000,
        postfix: '$'
    });
   
   $("#budget_daily").TouchSpin({          
        buttondown_class: 'btn green',
        buttonup_class: 'btn green',
        min: 5,
        max: 1000000000,
        stepinterval: 10,
        maxboostedstep: 10000000,
        postfix: '$'
    });
    
    $('#state').multiSelect();
});

