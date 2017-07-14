@extends('master')

@section ('content')

<!-- Main content -->
        <section class="content" style="margin-top: 4%">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Compose New Message</h3>
                <a href="message" class="btn btn-success btn-block margin-bottom" style="width: 17%; float: right">Back to Inbox</a>
              </div>

              <div class="box-body">
                <div class="form-group">
                  <select class="form-control choose" multiple="multiple" data-placeholder="To:" style="width: 100%;">
                    <option>Waxillium Ladrian</option>
                    <option>Kim Seok Jin</option>
                    <option>Park Chanyeol</option>
                    <option>Kim Taehyung</option>
                    <option>Byun Baekhyun</option>
                  </select>
                </div>

                <div class="form-group">
                  <input class="form-control" placeholder="Subject:">
                </div>

                <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px" placeholder="Type here..."></textarea>
                </div>

                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Attachment
                    <input type="file" name="attachment">
                  </div>
                  <p class="help-block">Max. 32MB</p>
                </div>
              </div> <!-- /.box-body -->

              <div class="box-footer">
                <div class="pull-right">
                  <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
              </div> <!-- /.box-footer -->

              </div>
              <!-- /. box -->
            </div>
            <!-- /.col -->
        </section>

@endsection