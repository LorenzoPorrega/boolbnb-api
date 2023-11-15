@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row p-4 box-messages">

      <div class="d-flex justify-content-end mb-3 me-5">
        <a href="{{ route('admin.apartments.index') }}">
          <button class="btn btn-info">Back</button>
        </a>
      </div>

      <div class="col position-relative">
        <div class="card">
          <div class="card-body text-white mailbox-widget pb-0">
            <h2 class="text-white ps-2 pb-2">Your Mailbox <i class="fas fa-envelope ms-2"></i></h2>
            <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="inbox-tab" data-toggle="tab" aria-controls="inbox" href="#inbox" role="tab" aria-selected="true">
                  <span> INBOX</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="sent-tab" data-toggle="tab" aria-controls="sent" href="#sent" role="tab" aria-selected="false">
                  <span>SENT</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="delete-tab" data-toggle="tab" aria-controls="delete" href="#delete" role="tab" aria-selected="false">
                  <span>DELETED</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="inbox" aria-labelledby="inbox-tab" role="tabpanel">
              <div>
                <div class="row px-4 pt-4 pb-3 align-items-center justify-content-between">
                  <div class="col-6">
                    <h3 class="mb-0">Emails List</h3>
                  </div>
                  <div class="col-6">
                    <ul class="list-inline d-flex justify-content-end align-items-center mb-0">
                      <li class="me-3">
                        <a href="#" class="btn btn-success text-white">
                          <i class="fa-solid fa-plus"></i>
                        </a>
                        <span class="ms-2 text-dark">Compose</span>
                      </li>
                      <li class="text-danger">
                        <a href="#" class="btn btn-danger text-white">
                          <i class="fa-solid fa-trash"></i>
                        </a>
                        <span class="ms-2 text-dark">Delete</span>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- Mail list-->
                <div class="table-responsive">
                  <table class="table email-table no-wrap table-hover mb-0">
                    <thead class="border-top-0">
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">From</th>
                        <th scope="col">Content</th>
                        <th scope="col">Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- row -->
                      @foreach ($messages->reverse() as $message)
                        <tr>
                          <!-- label -->
                          <td class="px-4">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="cst1"/>
                              <label class="custom-control-label" for="cst1">&nbsp;</label>
                            </div>
                          </td>
                          <!-- User -->
                          <td>
                            <span class="mb-0 text-muted">{{ $message->name }}</span>
                          </td>
                          <!-- Message -->
                          <td>
                            <span class="text-dark">{{ $message->message }}</span>
                          </td>
                          <!-- Time -->
                          <td class="text-muted">{{ $message->created_at }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style lang="scss">

  .card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    background-color: #fff;
    border-radius: 0;
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
  }

  .fa-solid{
    font-size: 1rem;
  }

  .mailbox-widget{
    background-color: rgb(14, 66, 179);
  }
  .mailbox-widget .custom-tab .nav-item .nav-link {
    border: 0;
    color: #fff;
    border-bottom: 3px solid transparent;
  }
  .mailbox-widget .custom-tab .nav-item .nav-link:hover {
    background: 0 0;
    color: #fff;
    border-bottom: 3px solid #2cd07e;
  }
  /* .mailbox-widget .custom-tab .nav-item .nav-link.active {
    background: 0 0;
    color: #fff;
    border-bottom: 3px solid #2cd07e;
  } */

  .table td, .table th {
    padding: 1rem;
  }

</style>
@endsection