<?php
$this->load->view('escritorio/header');
?>

<div id="conteudo">
    <div class="box">
        <h2 class="titulo"><?php echo $titulo; ?></h2>
        <br />
        <br />
        <div>
            <table style="margin: 0 auto !important; float: none !important;">
                <tr>
                    <td>
                        <div class="span2 offset2">
                            <!--
                            aqui vai o botão mercado pago
                            -->
                            <!-- Aqui você deve inserir a URL que corresponde a "init_point" -->
                            <a href="<?php echo $bt;?>" name="MP-Checkout" class="orange-L-Ov-ArOn" mp-mode="redirect">Pagar</a>

                            <!-- Cole esse código antes de fechar a etiqueta </body> -->
                            <script type="text/javascript">
                                (function() {
                                    function $MPBR_load() {
                                        window.$MPBR_loaded !== true && (function() {
                                            var s = document.createElement("script");
                                            s.type = "text/javascript";
                                            s.async = true;
                                            s.src = ("https:" == document.location.protocol ? "https://www.mercadopago.com/org-img/jsapi/mptools/buttons/" : "http://mp-tools.mlstatic.com/buttons/") + "render.js";
                                            var x = document.getElementsByTagName('script')[0];
                                            x.parentNode.insertBefore(s, x);
                                            window.$MPBR_loaded = true;
                                        })();
                                    }
                                    window.$MPBR_loaded !== true ? (window.attachEvent ? window.attachEvent('onload', $MPBR_load) : window.addEventListener('load', $MPBR_load, false)) : null;
                                })();
                            </script>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5><b>* Para esta operação serão acrescidas as taxas de utilização do PagSeguro.</b></h5>
                    </td>
                </tr>
            </table>
        </div>
        <br />
    </div>
</div>

<?php
$this->load->view('escritorio/footer');
?>