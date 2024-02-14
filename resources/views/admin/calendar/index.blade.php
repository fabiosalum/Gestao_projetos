@extends('admin.layouts.master')
@section('content')

@push('styles')

    <!-- Styles -->
    <link href="{{asset('assets/css/lib/calendar2/semantic.ui.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/helper.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- Toastr -->
    <link href="{{asset('assets/css/lib/toastr/toastr.min.css')}}" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="{{asset('assets/css/lib/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <!-- Range Slider -->
    <link href="{{asset('assets/css/lib/rangSlider/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/rangSlider/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <!-- Bar Rating -->
    <link href="{{asset('assets/css/lib/barRating/barRating.css')}}" rel="stylesheet">
    <!-- Nestable -->
    <link href="{{asset('assets/css/lib/nestable/nestable.css')}}" rel="stylesheet">
    <!-- JsGrid -->
    <link href="{{asset('assets/css/lib/jsgrid/jsgrid-theme.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/lib/jsgrid/jsgrid.min.css')}}" type="text/css" rel="stylesheet" />
    <!-- Datatable -->
    <link href="{{asset('assets/css/lib/data-table/buttons.bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Calender 2 -->
    <link href="{{asset('assets/css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Weather Icon -->
    <link href="{{asset('assets/css/lib/weather-icons.css')}}" rel="stylesheet" />
    <!-- Owl Carousel -->
    <link href="{{asset('assets/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
    <!-- Select2 -->
    <link href="{{asset('assets/css/lib/select2/select2.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link href="{{asset('assets/css/lib/chartist/chartist.min.css')}}" rel="stylesheet">
    <!-- Calender -->
    <link href="{{asset('assets/css/lib/calendar/fullcalendar.css')}}" rel="stylesheet" />

@endpush


<div class="main">
    <div class="container-fluid">
      <div class="row">
          <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 p-r-0 title-margin-right">
            <div class="page-header">
              <div class="page-title">
                <h1>Olá, <span>Welcome Here</span></h1>
              </div>
            </div>
          </div>
          <!-- /# column -->
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 p-l-0 title-margin-left">
            <div class="page-header page_header_2">
              <div class="page-title">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active">Calendario</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /# column -->
        </div>
      <!-- /# row -->
      <section id="main-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-title">
                <h4>Calendario</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3">
                    <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg btn-success btn-block waves-effect waves-light">
                      <i class="fa fa-plus"></i> Criar novo
                    </a>
                    <div id="external-events" class="m-t-20">
                      <br>
                      <p>Drag and drop your event or click in the calendar</p>
                      <div class="external-event bg-primary ui-draggable ui-draggable-handle" data-class="bg-primary" style="position: relative;">
                        <i class="fa fa-move"></i>New Theme Release
                      </div>
                      <div class="external-event bg-pink ui-draggable ui-draggable-handle" data-class="bg-pink" style="position: relative;">
                        <i class="fa fa-move"></i>Meu Evento
                      </div>
                      <div class="external-event bg-warning ui-draggable ui-draggable-handle" data-class="bg-warning" style="position: relative;">
                        <i class="fa fa-move"></i>Meet manager
                      </div>
                      <div class="external-event bg-dark ui-draggable ui-draggable-handle" data-class="bg-dark" style="position: relative;">
                        <i class="fa fa-move"></i>Criar novo tema
                      </div>
                    </div>

                    <!-- checkbox -->
                    <div class="checkbox m-t-40">
                      <input id="drop-remove" type="checkbox">
                      <label for="drop-remove">
                        Remove after drop
                      </label>
                    </div>

                  </div>
                  <div class="col-md-9">
                    <div class="card-box">
                      <div id="calendar" class="fc fc-unthemed fc-ltr"><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button></div><button type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right fc-state-disabled" disabled="">today</button></div><div class="fc-right"><div class="fc-button-group"><button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button><button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button><button type="button" class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">day</button></div></div><div class="fc-center"><h2>February 2024</h2></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view" style=""><table><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header"><table><thead><tr><th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th><th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th><th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th><th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th><th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th><th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th><th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-day-grid-container" style="overflow: hidden; height: 629px;"><div class="fc-day-grid fc-unselectable"><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 104px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2024-01-28"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2024-01-29"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2024-01-30"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-past" data-date="2024-01-31"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2024-02-01"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2024-02-02"></td><td class="fc-day fc-widget-content fc-sat fc-today fc-state-highlight" data-date="2024-02-03"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-past" data-date="2024-01-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-mon fc-other-month fc-past" data-date="2024-01-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-tue fc-other-month fc-past" data-date="2024-01-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-wed fc-other-month fc-past" data-date="2024-01-31"><span class="fc-day-number">31</span></td><td class="fc-day-top fc-thu fc-past" data-date="2024-02-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-fri fc-past" data-date="2024-02-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-sat fc-today fc-state-highlight" data-date="2024-02-03"><span class="fc-day-number">3</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-danger fc-draggable"><div class="fc-content"><span class="fc-time">4:56p</span> <span class="fc-title">See John Deo</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 104px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2024-02-04"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2024-02-05"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2024-02-06"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2024-02-07"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2024-02-08"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2024-02-09"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2024-02-10"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2024-02-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-mon fc-future" data-date="2024-02-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-tue fc-future" data-date="2024-02-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-wed fc-future" data-date="2024-02-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-thu fc-future" data-date="2024-02-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-fri fc-future" data-date="2024-02-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-sat fc-future" data-date="2024-02-10"><span class="fc-day-number">10</span></td></tr></thead><tbody><tr><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-dark fc-draggable"><div class="fc-content"><span class="fc-time">12:49p</span> <span class="fc-title">Hey!</span></div></a></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-primary fc-draggable"><div class="fc-content"><span class="fc-time">2:49p</span> <span class="fc-title">Buy a Theme</span></div></a></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 104px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2024-02-11"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2024-02-12"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2024-02-13"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2024-02-14"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2024-02-15"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2024-02-16"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2024-02-17"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2024-02-11"><span class="fc-day-number">11</span></td><td class="fc-day-top fc-mon fc-future" data-date="2024-02-12"><span class="fc-day-number">12</span></td><td class="fc-day-top fc-tue fc-future" data-date="2024-02-13"><span class="fc-day-number">13</span></td><td class="fc-day-top fc-wed fc-future" data-date="2024-02-14"><span class="fc-day-number">14</span></td><td class="fc-day-top fc-thu fc-future" data-date="2024-02-15"><span class="fc-day-number">15</span></td><td class="fc-day-top fc-fri fc-future" data-date="2024-02-16"><span class="fc-day-number">16</span></td><td class="fc-day-top fc-sat fc-future" data-date="2024-02-17"><span class="fc-day-number">17</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 104px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2024-02-18"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2024-02-19"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2024-02-20"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2024-02-21"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2024-02-22"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2024-02-23"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2024-02-24"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2024-02-18"><span class="fc-day-number">18</span></td><td class="fc-day-top fc-mon fc-future" data-date="2024-02-19"><span class="fc-day-number">19</span></td><td class="fc-day-top fc-tue fc-future" data-date="2024-02-20"><span class="fc-day-number">20</span></td><td class="fc-day-top fc-wed fc-future" data-date="2024-02-21"><span class="fc-day-number">21</span></td><td class="fc-day-top fc-thu fc-future" data-date="2024-02-22"><span class="fc-day-number">22</span></td><td class="fc-day-top fc-fri fc-future" data-date="2024-02-23"><span class="fc-day-number">23</span></td><td class="fc-day-top fc-sat fc-future" data-date="2024-02-24"><span class="fc-day-number">24</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 104px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2024-02-25"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2024-02-26"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2024-02-27"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2024-02-28"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2024-02-29"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2024-03-01"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2024-03-02"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2024-02-25"><span class="fc-day-number">25</span></td><td class="fc-day-top fc-mon fc-future" data-date="2024-02-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-tue fc-future" data-date="2024-02-27"><span class="fc-day-number">27</span></td><td class="fc-day-top fc-wed fc-future" data-date="2024-02-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-thu fc-future" data-date="2024-02-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2024-03-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2024-03-02"><span class="fc-day-number">2</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 109px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-future" data-date="2024-03-03"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2024-03-04"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2024-03-05"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2024-03-06"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2024-03-07"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2024-03-08"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2024-03-09"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-future" data-date="2024-03-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-mon fc-other-month fc-future" data-date="2024-03-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-tue fc-other-month fc-future" data-date="2024-03-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2024-03-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2024-03-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2024-03-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2024-03-09"><span class="fc-day-number">9</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
                    </div>
                  </div>
                  <!-- end col -->
                  <!-- BEGIN MODAL -->
                  <div class="modal fade none-border" id="event-modal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h4 class="modal-title">
                            <strong>Adicionar novo Evento</strong>
                          </h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Fechar</button>
                          <button type="button" class="btn btn-success save-event waves-effect waves-light">Criar Evento</button>
                          <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Deletar</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Add Category -->
                  <div class="modal fade none-border" id="add-category">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h4 class="modal-title">
                            <strong>Adicionar uma categoria</strong>
                          </h4>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="row">
                              <div class="col-md-6">
                                <label class="control-label">Nome</label>
                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name">
                              </div>
                              <div class="col-md-6">
                                <label class="control-label">Escolha a cor da categoria</label>
                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                  <option value="success">Success</option>
                                  <option value="danger">Danger</option>
                                  <option value="info">Info</option>
                                  <option value="pink">Pink</option>
                                  <option value="primary">Primary</option>
                                  <option value="warning">Warning</option>
                                </select>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Fechar</button>
                          <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Salvar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- END MODAL -->
                </div>
              </div>
            </div>
            <!-- /# card -->
          </div>
          <!-- /# column -->
        </div>
        <!-- /# row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="footer">
              <p>2018 ©  mid Admin Board by <a href="#">webstrot.</a></p>
            </div>
          </div>
        </div>
      </section>

    </div>
  </div>


@push('scripts')


    <script src="{{asset('assets/js/lib/calendar-2/moment.latest.min.js')}}"></script>
    <!-- scripit init-->
    <script src="{{asset('assets/js/lib/calendar-2/semantic.ui.min.js')}}"></script>
    <!-- scripit init-->
    <script src="{{asset('assets/js/lib/calendar-2/prism.min.js')}}"></script>
    <!-- scripit init-->
    <script src="{{asset('assets/js/lib/calendar-2/pignose.calendar.min.js')}}"></script>
    <!-- scripit init-->
    <script src="{{asset('assets/js/lib/calendar-2/pignose.init.js')}}"></script>
    <!-- scripit init-->

    <script src="{{asset('assets/js/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <!-- scripit init-->


    <script src="{{asset('assets/js/lib/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/moment/moment.js')}}"></script>
    <script src="{{asset('assets/js/lib/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/calendar/fullcalendar-init.js')}}"></script>
    <!-- scripit init-->



@endpush

@endsection
