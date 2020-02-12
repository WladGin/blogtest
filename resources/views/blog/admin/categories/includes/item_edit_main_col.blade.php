@php
    /** @var App\Models\BlogCategory $item */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#maindata" data-toggle="tab" role="tab" class="nav-link active">Основные данные</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text" id="title" class="form-control" minlength="3" required
                                       value="{{old('title', $item->title)}}" name="title">
                            </div>

                            <div class="form-group">
                                <label for="slug">Идентификатор</label>
                                <input type="text" id="slug" class="form-control"
                                       value="{{old('slug', $item->slug)}}" name="slug">
                            </div>

                            <div class="form-group">
                                <label for="parent_id">Родитель</label>
                                <select id="parent_id" class="form-control" name="parent_id" required>
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{$categoryOption->id}}"
                                                @if($categoryOption->id ==$item->parent_id) selected @endif>
                                            {{$categoryOption->id}}. {{$categoryOption->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea name="description" id="description" rows="3" class="form-control">
                                    {{old('description', $item->description)}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

