             <div id="acount" class="collapse" style="">
                                <div class="account-list-content">
								 <div>
                                        <a class="login" href="<?php echo base_url().'customer/information/';?>" rel="nofollow" title="mon compte">
                                                <span  style="display:none;"><?php echo $this->session->userdata('customer_firstname').' '.$this->session->userdata('customer_lastname');?></span>
                                        
                                            <span  style="text-transform: initial;"><?php echo $this->session->userdata('customer_email');?></span>
                                        </a>
                                    </div>
									 <div>
                                        <a class="login" href="<?php echo base_url().'customer/information/';?>" rel="nofollow" title="Mon compte">
                                            <i class=" fa fa-angle-right "></i>
                                            <span>Voir Mon compte</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="login" href="#" rel="nofollow" title="Repasser une commander">
                                            <i class=" fa fa-angle-right"></i>
                                            <span>Repasser une commander</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="login" href="#" rel="nofollow" title="Voir mes facteurs">
                                            <i class="fa fa-angle-right "></i>
                                            <span>Voir mes facteurs</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="register" href="<?php echo base_url().'orders/purchases/';?>" rel="nofollow" title="Voir mes liste d'achats">
                                            <i class=" fa fa-angle-right "></i>
                                            <span>Voir mes liste d'achats</span>
                                        </a>
                                    </div>
                                  
                                    <div style="display:none;">
                                        <a href="<?php echo base_url().'accounts/system_logout/';?>" title="Se d??connecter">
                                            <i class="fa fa-angle-right "></i>
                                            <span>Se d??connecter</span>
                                        </a>
                                    </div>
                                   
                               
                                </div>
                            </div>
   