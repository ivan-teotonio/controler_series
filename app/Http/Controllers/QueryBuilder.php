<?php 

$users = DB::table('users')->get();
// dd($users);

$users = DB::table('users')->find(5);
// dd($users);

$users = DB::table('users')->first();
// dd($users);

$users = DB::table('users')->where('email','gabriela.alves@example.com')->get();
//dd($users);

//checar se existe retorna true
$users = DB::table('users')->where('email','gabriela.alves@example.com').exists();
dd($users);

//checar se não existe se não existe retorn true
 $users = DB::table('users')->where('email','')>doesntExist();
 dd($users);

 //selecionando uma coluna especifica
 $users = DB::table('users')->select('name')->get();
 dd($users); 

 //ordenando resultado
 $users = DB::table('users')->orderBy('name','desc')->get();

 //pegar um registro de forma aleatoria
 $users = DB::table('users')->inRandomOrder()->first();
 dd($users);

 //ordenar pela data 
 $users = DB::table('users')->oldest()->get();
 dd($users);
// ordenar pela data 
$users = DB::table('users')->latest()->get();
dd($users);

 //limitar a quantidade de registros
 $users = DB::table('users')->limit(2)->get();

 //limitar a quantidade de registros pulando o primeiro
 //skip mesma coisa que o offset
 $users = DB::table('users')skip(1)->limit(2)->get();

 //exemplo de dois últiimos registros
 $users = DB::table('users')->oldest()->limit(2)->get();

 //where
 $users = DB::table('users')->where('name','=','João Pedro')->first();
 
 $users = DB::table('users')->where('name','like','A%')
 where('id','=',1)->get();

 //orWhere uma coisa ou outra
 $users = DB::table('users')->where('name','like','A%')
 orWhere('name','=','Maria')->get();

 //SELECT * from users  where name = 'x' OR (name = 'y)
 //igual a query é asubcondição que executa primeiro
 $users = DB::table('users')->where('name','Ivan')
 ->orWhere(function($query){
     $query->where('name','Maria')
    // ->where('id',1);
 })->get();

 //whereNot qualquer um que não sejaq o nome Ivan
 $users = DB::table('users')->whereNot('name','Ivan')->get();

 //whereLike 
 //serve para fazer uma busca por uma parte do nome
 $users = DB::table('users')->whereLike('name','%a%')->get();

 //whereNotLike
 //serve para fazer uma busca por uma parte do nome
 $users = DB::table('users')->whereNotLike('name','%a%')->get();

 //orWhereLike
 //serve para fazer uma busca por uma parte do nome
 $users = DB::table('users')->where('name','Ivan')
 ->orWhereLike('name','%a%')->get();

 //orWhereNotLike
 //serve para fazer uma busca por uma parte do nome
 $users = DB::table('users')->where('name','Ivan')
 ->orWhereNotLike('name','%a%')->get();

 //whereBetween
 //buesca entre um intervalo
 $users = DB::table('users')->whereBetween('id',[1,3])->get();

 //whereNotBetween
 //buesca entre um intervalo
 $users = DB::table('users')->whereNotBetween('id',[1,3])->get();

 //consulta baseada numa coleção de valores
 //whereIn serve para buscar em um array de valores
 $users = DB::table('users')->whereIn('id',[1,2,3])->get();

 //whereNotIn serve para buscar em um array de valores
 //tudo que não estiver no array
 $users = DB::table('users')->whereNotIn('id',[1,2,3])->get();

 //whereNull
 //busca por valores nulos
 $users = DB::table('users')->whereNull('name')->get();

 //whereNotNull
 //busca por valores NÃO nulos
 $users = DB::table('users')->whereNotNull('name')->get();

 //orWhereNull
 //busca por valores nulos ou não
 $users = DB::table('users')->where('name','Ivan')
 ->orWhereNull('name')->get();

 //orWhereNotNull
 //busca por valores nulos ou não
 $users = DB::table('users')->where('name','Ivan')
 ->orWhereNotNull('name')->get();

 //whereDate
 //busca por data
 $users = DB::table('users')->whereDate('created_at','2021-08-01')->get();

 //whereMonth
 //busca por mês
 $users = DB::table('users')->whereMonth('created_at','08')->get();

 //whereDay
 //busca por dia
 $users = DB::table('users')->whereDay('created_at','01')->get();

 //whereYear
 //busca por ano
 $users = DB::table('users')->whereYear('created_at','2021')->get();

 //whereTime
 //busca por hora
 $users = DB::table('users')->whereTime('created_at','08:00:00')->get();

 //whereColumn
 //compara duas colunas
 $users = DB::table('users')->whereColumn('name','email')->get();

 //saber se o usuario atualizou o perfil
 $users = DB::table('users')->whereColumn('updated_at','>','created_at')->get();

 //wherelAll 
 //busca por todos os valores igual ao function(query)
 //forma de combinar where
 $users = DB::table('users')->whereAll(['name','Ivan'],'like','A%')->get();

 //whereAny
 //mesma coisa que o whereAll usando o or
 $users = DB::table('users')->whereAny(['name','Ivan'],'like','A%')->get();

 $users = DB::table('users')
//->where(function($query){
   //  $query->where('name','like','A%')
    // ->orWhere('name','like','B%');
    whereAny(['name','Ivan'],'like','A%')
 })->get();

 //whereNone 
 //busca por todos os valores diferente do function(query)
 //forma de combinar where
 //nega where e orWhere
 $users = DB::table('users')->whereNone(['name','Ivan'],'like','A%')->get();

 //GRUPOS LÓGICOS COM WHERE
 //SELECT * FROM USERS WHERE (ISSO AND AQUILO) OR (AQUILO AND ISSO) OR (ISSO AND AQUILI)
 //CLOSURE
 $users = DB::table('users')
 ->where(function($query){
     $query->where('name','Ivan')   
 })
 ->orWhere(function($query){
     $query->where('name','Maria')
 })->get();

 //inner join
 $users = DB::table('users')
 ->join('posts','users.id','=','posts.user_id')
 ->get();

 //left join
 $users = DB::table('users')
 ->leftJoin('posts','users.id','=','posts.user_id')
 ->select('users.name','posts.title')
 ->get();

 //right join
 $users = DB::table('users')
 ->rightJoin('posts','users.id','=','posts.user_id')
 ->get();

 //consulta avançadas com join
 $users = DB::table('users')
 ->join('posts',function($join){
     $join->on('users.id','=','posts.user_id')
     ->where('posts.user_id','>',8);
 });

 //query baseadas em condições
 $users = DB::table('users')
 $name = $request->name;
 ->when(!empty($name),function($query) use ($name){
     $query->where('name','like','%'.$name.'%')
 })
 ->get();

 //insert
 DB::table('users')->insert([
     'name' => 'Ivan',
     'email' => 'ivan@gmail.com'
 ]);

 //insertGetId
 //retorna o id do registro inserido
 $id = DB::table('users')->insertGetId([
     'name' => 'Ivan',
     'email' => 'ivan#gmail.com'
 ]);

 //update
 DB::table('users')->where('id',1)->update([
     'name' => 'Ivan',
     'email' => 'ivan@gmail.com'
 ]);

 //insertOrIgnore
 //insere um registro se ele não existir
 DB::table('users')->insertOrIgnore([
     'name' => 'Ivan',
     'email' => 'ivan@gmail.com'
 ]);

 //delete
 DB::table('users')->where('id',1)->delete();

 //delete
 //delete all
 DB::table('users')->delete();
 DB::table('users')->truncate();

 //soft delete
 DB::table('users')->where('id',1)->delete();
 DB::table('users')->where('id',1)->forceDelete();

 //inserindo ou atualizando
 //se o registro existir ele atualiza se não ele insere
 DB::table('users')->updateOrInsert(
     ['email' => '', 'name' => ''],
     ['email' => '', 'name' => '']
 );

 //atualizando ou inserindo
 //se o registro existir ele atualiza se não ele insere
 DB::table('users')->upsert(
     ['email' => '', 'name' => ''],
     ['email' => '', 'name' => '']
 );

 //incrementando ou decrementando valores
 DB::table('users')->where('id',1)->increment('votes');
 DB::table('users')->where('id',1)->decrement('votes');



