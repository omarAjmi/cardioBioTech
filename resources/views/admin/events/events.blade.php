@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                        <span class="badge badge-pill badge-primary">Success</span>
                        You successfully read this important alert.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <h3 class="title-5 m-b-35">Évènement</h3>
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <select class="js-select2 select2-hidden-accessible" name="property" tabindex="-1"
                                        aria-hidden="true">
                                        <option selected="selected">All Properties</option>
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                        style="width: 136px;"><span class="selection"><span class="select2-selection select2-selection--single"
                                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-labelledby="select2-property-rb-container"><span class="select2-selection__rendered"
                                                    id="select2-property-rb-container" title="All Properties">All
                                                    Properties</span><span class="select2-selection__arrow" role="presentation"><b
                                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                            aria-hidden="true"></span></span>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm">
                                    <select class="js-select2 select2-hidden-accessible" name="time" tabindex="-1"
                                        aria-hidden="true">
                                        <option selected="selected">Today</option>
                                        <option value="">3 Days</option>
                                        <option value="">1 Week</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                        style="width: 82px;"><span class="selection"><span class="select2-selection select2-selection--single"
                                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-labelledby="select2-time-tt-container"><span class="select2-selection__rendered"
                                                    id="select2-time-tt-container" title="Today">Today</span><span class="select2-selection__arrow"
                                                    role="presentation"><b role="presentation"></b></span></span></span><span
                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <button class="au-btn-filter">
                                    <i class="zmdi zmdi-filter-list"></i>filters</button>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="{{ route('admin.newEvent') }}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>ajouter évènement
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th>
                                        <th>abbreviation</th>
                                        <th>titre</th>
                                        <th>programme</th>
                                        <th>début</th>
                                        <th>fin</th>
                                        <th>etat</th>
                                        <th>options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tr-shadow">
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td>Lori Lynch</td>
                                        <td>
                                            <span class="block-email">lori@example.com</span>
                                        </td>
                                        <td class="desc">Samsung S8 Black</td>
                                        <td>2018-09-27 02:12</td>
                                        <td>2018-09-27 02:12</td>
                                        <td>
                                            <span class="status--process">Processed</span>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <a href="{{ route('admin') }}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection