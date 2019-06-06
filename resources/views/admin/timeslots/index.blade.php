@extends('layouts.admin')
@section('content')
@can('timeslot_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.timeslots.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.timeslot.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.timeslot.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.timeslot.fields.servant') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeslot.fields.start_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeslot.fields.end_time') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeslots as $key => $timeslot)
                        <tr data-entry-id="{{ $timeslot->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $timeslot->servant->surname ?? '' }}
                            </td>
                            <td>
                                {{ $timeslot->start_time ?? '' }}
                            </td>
                            <td>
                                {{ $timeslot->end_time ?? '' }}
                            </td>
                            <td>
                                @can('timeslot_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.timeslots.show', $timeslot->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('timeslot_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.timeslots.edit', $timeslot->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('timeslot_delete')
                                    <form action="{{ route('admin.timeslots.destroy', $timeslot->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.timeslots.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('timeslot_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection