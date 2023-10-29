$(window).ready(function(){
    function mascaraValor(valor) {
        valor = valor.toString().replace(/\D/g,"");
        valor = valor.toString().replace(/(\d)(\d{8})$/,"$1.$2");
        valor = valor.toString().replace(/(\d)(\d{5})$/,"$1.$2");
        valor = valor.toString().replace(/(\d)(\d{2})$/,"$1,$2");
        return valor                     
    }
    $(".input-preco").on('keyup', function(){
        let preco = $(this).val();
        preco = preco.replace(/[^\d,]/g, '');
        $(this).val(mascaraValor(preco));
    });
    $(".excluir-js").on('click', async function(){
        let action = $(this).attr('id');
        if(confirm("Deseja excluir?")){
            $(".formulario-de-exclusao").attr('action', action);
            $(".formulario-de-exclusao button").click();  
        }else{
            
        }
    }); 
    $(".input-marca").on('change', async function(){
        $(".loading").show();
        let value = $(this).val();	 
        await $.ajax({
            url: `/painel/ajax/${value}`,  
            data: {"_token": "{{ csrf_token() }}"}, 
            type: 'get',
            dataType: 'json',
            success: function (data) {
                if(data.result != ""){
                    $(".input-modelo").html(`<option value="" hidden>Selecione</option>`);
                    for(let i of data.result){
                        console.log(i.id); 
                        console.log(i.modelo);
                        $(".input-modelo").append(`<option value="${i.id}">${i.modelo}</option>`);
                    } 
                }else{
                    alert("Nenhum modelo cadastrado");
                    $(".input-modelo").html(`<option value="" hidden>Primeiro selecione a marca...</option>`);
                } 
                $(".loading").hide();
            }, 
            error: function (data) {
                $(".loading").hide();
            }  
        })
    });
    $('table').DataTable( {
        order: [[ 1, 'asc' ], [ 0, 'asc' ]],  
        lengthMenu: [
            [100, 250, 500, -1],
            [100, 250, 500, 'All']
        ]
    } );
    function HideMsg() {
        $(".flash-msg").hide(600);
    }
    setTimeout(HideMsg, 2000);

    $('.preview-foto-js').on("change", function(){
        $(this).each(function(index){
            if ($(this).eq(index).val() != ""){
                readURL(this);
            }
        });

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.preview-foto').html(`<img src="${e.target.result}">`);
            };
            reader.readAsDataURL(input.files[0]);
        }else {
            var img = input.value;
            $('.preview-foto').html(`<img src="${img}">`);
        }  
    }   
   
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 0,
            items: 1,
            autoplay: true,
            autoplayTimeout: 5000,
            responsiveClass: true,
            nav: false,
            dots: false,
        });
    });

});