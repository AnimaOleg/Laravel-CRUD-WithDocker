<div class="col-xs-12 col-sm-12 col-md-12 mt-2">
    <div class="form-group">
        <strong>Tarea:</strong>
        <input type="text" name="title" class="form-control" placeholder="Tarea" value="{{old('title')}}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-2">
    <div class="form-group">
        <strong>Descripción:</strong>
        <textarea class="form-control" style="height:150px" name="description" placeholder="Descripción..." >{{old('description')}}</textarea>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 mt-2">
    <div class="form-group">
        <strong>Fecha límite:</strong>
        <input type="date" name="due_date" class="form-control" id="" value="{{old('due_date')}}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 mt-2">
    <div class="form-group">
        <strong>Estado (inicial):</strong>
        <select name="status" class="form-select" id="">
            <option value="">-- Elige el status --</option>
            <option value="Pendiente" {{ old('status') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="En progreso" {{ old('status') == 'En progreso' ? 'selected' : '' }}>En progreso</option>
            <option value="Completada" {{ old('status') == 'Completada' ? 'selected' : '' }}>Completada</option>
        </select>
    </div>
</div>