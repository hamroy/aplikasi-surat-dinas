<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap"><span class="hide-menu">MENU</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link active" href="<?=base_url('C_beranda')?>"
                        aria-expanded="false"><i class="fas fa-home"></i>
                            <span class="hide-menu">BERANDA</span></a>
                        </li>

                        <!-- MASTERDATA -->
                        <li class="sidebar-item <?=$ma?>"> 
                            <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="fas fa-hdd"></i><span
                                    class="hide-menu">MASTER DATA </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                
                                <li class="sidebar-item">
                                    <a href="<?=base_url('C_master')?>" class="sidebar-link">
                                    <span class="hide-menu"> Klasifikasi </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?=base_url('C_master/jabatan')?>" class="sidebar-link">
                                    <span class="hide-menu"> Jabatan </span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="<?=base_url('C_master/pegawai')?>" class="sidebar-link">
                                    <span class="hide-menu"> Pegawai </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="list-divider "></li>                        
                        <!-- INPUT -->
                        <li class="sidebar-item <?=$in?>"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">INPUT </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line" >
                                <li class="sidebar-item" >
                                    <a href="<?=base_url('C_input')?>" class="sidebar-link">
                                        <span class="hide-menu" > Agenda Surat Keluar </span>
                                    </a>
                                </li>

                                <li class="sidebar-item" >
                                    <a href="<?=base_url('C_input/sMasuk')?>" class="sidebar-link">
                                        <span class="hide-menu" > Agenda Surat Masuk </span>
                                    </a>
                                </li>

                                <li class="sidebar-item" >
                                    <a href="<?=base_url('C_input/sKeputusan')?>" class="sidebar-link">
                                        <span class="hide-menu" > Surat Keputusan </span>
                                    </a>
                                </li>
                                
                                <li class="sidebar-item" >
                                    <a href="<?=base_url('C_input/sPTA')?>" class="sidebar-link">
                                        <span class="hide-menu" > SPT Anggaran </span>
                                    </a>
                                </li>

                                <li class="sidebar-item" >
                                    <a href="<?=base_url('C_input/sPTNA')?>" class="sidebar-link">
                                        <span class="hide-menu" > SPT Non Anggaran </span>
                                    </a>
                                </li> 

                                <li class="sidebar-item" >
                                    <a href="<?=base_url('C_input/sPerjalananDinas')?>" class="sidebar-link">
                                        <span class="hide-menu" > Surat Perjalanan Dinas </span>
                                    </a>
                                </li>

                                <li class="sidebar-item" >
                                    <a href="<?=base_url('C_input/lapPerjalananDinas')?>" class="sidebar-link">
                                        <span class="hide-menu" > Lap Perjalanan Dinas </span>
                                    </a>
                                </li>

                                <li class="sidebar-item" >
                                    <a href="<?=base_url('C_input/sPenugasan')?>" class="sidebar-link">
                                        <span class="hide-menu" >Surat Penugasan </span>
                                    </a>
                                </li>

                                <li class="sidebar-item" >
                                    <a href="<?=base_url('C_input/notaDinas')?>" class="sidebar-link">
                                        <span class="hide-menu" > Nota Dinas </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- DAFTAR -->

                        <li class="sidebar-item <?=$li?>"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i  class="far fa-list-alt"></i><span
                                    class="hide-menu">DAFTAR AGENDA </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                               
                                <li class="sidebar-item"><a href="<?=base_url('C_agenda/sPenugasan')?>" class="sidebar-link"><span
                                            class="hide-menu"> Surat Penugasan
                                        </span></a>
                                </li>
                            </ul>
                        </li>

                        <!-- LAPORAN -->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="fas fa-clipboard-list"></i><span
                                    class="hide-menu">LAPORAN</span></a>
                           <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="<?=base_url('C_listAgenda')?>" class="sidebar-link"><span class="hide-menu"> Surat Keluar</span></a>
                                </li>

                                <li class="sidebar-item"><a href="<?=base_url('C_listAgenda/listMasuk')?>" class="sidebar-link"><span class="hide-menu"> Surat Masuk</span></a>
                                </li>

                                <li class="sidebar-item"><a href="<?=base_url('C_listAgenda/listKeputusan')?>" class="sidebar-link"><span class="hide-menu"> Surat Keputusan</span></a>
                                </li>

                                <li class="sidebar-item"><a href="<?=base_url('C_listAgenda/listPTA')?>" class="sidebar-link"><span class="hide-menu"> Surat Perintah Tugas</span></a>
                                </li>

                                <li class="sidebar-item"><a href="<?=base_url('C_listAgenda/listPTNA')?>" class="sidebar-link"><span class="hide-menu"> SPT Non Anggaran</span></a>
                                </li>

                                <li class="sidebar-item"><a href="<?=base_url('C_listAgenda/listSPPD')?>" class="sidebar-link"><span class="hide-menu"> Surat Perjalanan Dinas</span></a>
                                </li>

                                <li class="sidebar-item"><a href="<?=base_url('C_listAgenda/listLapSPPD')?>" class="sidebar-link"><span class="hide-menu"> Perjalanan Dinas</span></a>
                                </li>

                                <li class="sidebar-item"><a href="<?=base_url('C_listAgenda/listPenugasan')?>" class="sidebar-link"><span class="hide-menu"> Surat Penugasan</span></a>
                                </li>

                                <li class="sidebar-item"><a href="<?=base_url('C_listAgenda/listNotaDinas')?>" class="sidebar-link"><span class="hide-menu"> Nota Dinas</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>