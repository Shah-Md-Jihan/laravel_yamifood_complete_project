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
            <li class="breadcrumb-item active" aria-current="page">Mailbox</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-12 m-auto">
              {{-- mail_delete_alert start --}}
              @if (session('mail_delete_alert'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                </svg>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    <strong>{{ session('mail_delete_alert') }}</strong>
                  </div>
                </div>
              @endif
              {{-- mail_delete_alert end --}}

            <div class="card">
              <div class="card-header text-white" style="background:#1E13B2">
                <strong>Mailbox :</strong>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>sl no</th>
                      <th>sender name</th>
                      <th>from</th>
                      <th>message</th>
                      <th>sent time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($mails as $mail)
                      <tr class="{{ ($mail->role == 1) ? 'bg-dark text-white' : ''}}">
                        <td>{{ $mails->firstItem() + $loop->index }}</td>
                        <td>{{ $mail->name }}</td>
                        <td>{{ $mail->email }}</td>
                        <td>{{ Str::limit($mail->message, 20) }}</td>
                        <td>{{ $mail->created_at->format('D d M Y h:i:s A') }}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('/mail/read/') }}/{{ $mail->id }}" type="button" class="btn btn-success btn-sm">Read</a>
                            @if ($mail->role == 1)
                              <a href="{{ url('/mail/mark/read') }}/{{ $mail->id }}" type="button" class="btn btn-info btn-sm">Mark As Read</a>
                            @endif
                            <a href="{{ url('/mail/delete/') }}/{{ $mail->id }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan='50'>
                          <div class="alert alert-danger">
                            <strong>No data to show</strong>
                          </div>
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
                {{ $mails->links() }}
              </div>
            </div>
          </div>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">

      </div><!-- br-pagebody -->

@endsection
