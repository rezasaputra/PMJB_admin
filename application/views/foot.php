	 <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pull-right">
                <ul class="footer-list list-inline">
                    <li>
                        <p class="text-sm">SEO Proggres</p>
                        <div class="progress progress-sm progress-light-base">
                            <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                        </div>
                    </li>

                    <li>
                        <p class="text-sm">Online Tutorial</p>
                        <div class="progress progress-sm progress-light-base">
                            <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
                        </div>
                    </li>
                    <li>
                        <button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
                    </li>
                </ul>
            </div>



            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="hide-fixed pull-right pad-rgt">Currently v1.0</div>



            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; <script type="text/javascript">
                    var dt = new Date();
                    document.write( dt.getFullYear() ); 
                </script> Homitech - Web Team</p>



        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL TOP BUTTON -->
        <!--===================================================-->
        <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
        <!--===================================================-->



	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->
	
	
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="<?php echo base_url()?>assets/js/jquery-2.1.1.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>


    <!--Fast Click [ OPTIONAL ]-->
    <script src="<?php echo base_url()?>assets/plugins/fast-click/fastclick.min.js"></script>

    
    <!--Nifty Admin [ RECOMMENDED ]-->
    <script src="<?php echo base_url()?>assets/js/nifty.min.js"></script>

    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <script src="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>


    <!--Morris.js [ OPTIONAL ]-->
    <script src="<?php echo base_url()?>assets/plugins/morris-js/morris.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/morris-js/raphael-js/raphael.min.js"></script>

    <!--Chosen [ OPTIONAL ]-->
    <script src="<?php echo base_url()?>assets/plugins/chosen/chosen.jquery.min.js"></script>


    <script src="<?php echo base_url()?>assets/plugins/alightbox/ALightBox.js"></script>

    <!--Sparkline [ OPTIONAL ]-->
    <script src="<?php echo base_url()?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>


    <!--Skycons [ OPTIONAL ]-->
    <script src="<?php echo base_url()?>assets/plugins/skycons/skycons.min.js"></script>

    <!--Switchery [ OPTIONAL ]-->
    <script src="<?php echo base_url()?>assets/plugins/switchery/switchery.min.js"></script>

    <!--DataTables [ OPTIONAL ]-->
    <script src="<?php echo base_url()?>assets/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    
    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="<?php echo base_url()?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>

    <!--Dropzone [ OPTIONAL ]-->
    <script src="<?php echo base_url()?>assets/plugins/dropzone/dropzone.min.js"></script>

    <!--Bootbox Modals [ OPTIONAL ]-->
    <script src="<?php echo base_url()?>assets/plugins/bootbox/bootbox.min.js"></script>


    <!--Demo script [ DEMONSTRATION ]-->
    <script src="<?php echo base_url()?>assets/js/demo/nifty-demo.min.js"></script>


    <!--Specify page [ SAMPLE ]-->
    <script src="<?php echo base_url()?>assets/js/demo/dashboard.js"></script>
   
    
	<!--

	REQUIRED
	You must include this in your project.

	RECOMMENDED
	This category must be included but you may modify which plugins or components which should be included in your project.

	OPTIONAL
	Optional plugins. You may choose whether to include it in your project or not.

	DEMONSTRATION
	This is to be removed, used for demonstration purposes only. This category must not be included in your project.

	SAMPLE
	Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


	Detailed information and more samples can be found in the document.

	-->
	<script>
     $(".date-picker").datepicker({
            autoclose: !0
        });   
     $("#dataTable").DataTable({
            responsive:true
        });
    $(".chosen").chosen();

    // $(".dropzone").dropzone({
    //     height : "200px"
    // });

    <?php echo isset($js) ? $js :'';?>
    
    </script>
        <script type="text/javascript">
            $('body').ALightBox({
                showYoutubeThumbnails: true
            });
        </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <script type="text/javascript">
            function initializeAutocomplete(){
            var input = document.getElementById('locality');
            // var options = {
            //   types: ['(regions)'],
            //   componentRestrictions: {country: "IN"}
            // };
            var options = {}

            var autocomplete = new google.maps.places.Autocomplete(input, options);

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
              var place = autocomplete.getPlace();
              var lat = place.geometry.location.lat();
              var lng = place.geometry.location.lng();
              var address = place.formatted_address;
              // to set city name, using the locality param
              var componentForm = {
                locality: 'short_name',
              };
              for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                  var val = place.address_components[i][componentForm[addressType]];
                  document.getElementById("city").value = val;
                }
              }
              document.getElementById("ilat").value = lat;
              document.getElementById("ilong").value = lng;
              document.getElementById("ialamat").value = address;
            });
          }
            </script>

</body>

<!-- Mirrored from www.themeon.net/nifty/v2.2.3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2015 09:28:48 GMT -->
</html>
