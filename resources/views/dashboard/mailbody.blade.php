@extends('layouts.dashboard_master')
@section('mailbox')
  active
@endsection
@section('backend_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/mail/box') }}">Mailbox</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mail Read</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-12 m-auto">
            <div class="card">
              <div class="card-header text-white" style="background:#1E13B2">
                <strong>Mail Body:</strong>
              </div>
              <div class="card-body">
                <strong>Sent: {{ $mail_info->created_at->format('d m Y h:i:s A') }}</strong><br>
                <strong>Sender: {{ $mail_info->email }}</strong><br>
                <strong>Message:</strong><br>
                <p>{{ $mail_info->message }}</p>
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
