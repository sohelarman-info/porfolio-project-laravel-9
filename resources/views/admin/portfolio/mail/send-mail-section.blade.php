@extends('admin.layouts.app')
@section('title', 'Inbox')
@section('SendMail', 'menu-open')
@section('SendMailSection', 'active')
@section('home', 'active')

@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inbox</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inbox</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Folders</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="#" class="nav-link">
                    <i class="fas fa-inbox"></i> Inbox
                    <span class="badge bg-primary float-right">{{ $mails->count() }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-envelope"></i> Sent
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-file-alt"></i> Drafts
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-filter"></i> Junk
                    <span class="badge bg-warning float-right">65</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-trash-alt"></i> Trash
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            @if (session('Delete'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    {{ session('Delete') }}
                </div>
            @endif
            @if($mails->count() == 0)
                <div class="text-center">
                    <p>Inbox Empty</p>
                </div>
            @else

          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  @foreach ($mails as $mail)
                  <tr>
                    <td>
                      <div class="icheck-primary">
                        <a href="{{ route('SendMailDelete', $mail->id) }}" class="btn btn-default btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </a>
                      </div>
                    </td>
                    <td class="mailbox-name">
                        <a href="{{ route('SendMailview', $mail->id) }}">
                                @if($mail->user_id == '')
                                {{ $mail->user }}
                                @else
                                {{ $mail->User->name }}
                            @endif
                        </a>
                    </td>
                    <td class="mailbox-name">
                        <a href="{{ route('SendMailview', $mail->id) }}">
                                {{ $mail->name }}
                        </a>
                    </td>
                    <td class="mailbox-subject">
                    @if($mail->status == 1)
                        <b>{{ $mail->email }}</b>
                    @else
                        {{ $mail->email }}
                    @endif - {!! Str::limit($mail->text, 70, ' ...') !!}</td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">{{ $mail->created_at->diffForHumans() }}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                {!! $mails->withQueryString()->links('pagination::bootstrap-5') !!}
              </div>
            </div>
          </div>
            @endif
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
