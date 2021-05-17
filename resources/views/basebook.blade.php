<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="{{ Storage::url($book->image) }}" alt="Книга">
        <div class="caption">
            <h3>{{$book->name}}</h3>
            <p>{{$book->price}} руб.</p>
            <p>
                <form action="{{ route('basket-add', $book) }}" method="POST">
                    <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                    <a href="{{route('book', [$book->genre->code, $book->code])}}" class="btn btn-default" role="button">Подробнее</a>
                    @csrf
                </form>
            </p>
        </div>
    </div>
</div>