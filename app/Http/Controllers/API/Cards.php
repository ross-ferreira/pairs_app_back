<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Card;
use App\Http\Requests\API\CardRequest;
use App\Http\Resources\API\CardResource;
use App\Http\Resources\API\CardListResource;

class Cards extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Card::all();
        return CardListResource::collection(Card::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    public function store(CardRequest $request)
    {
        // get all the request data
        // returns an array of all the data the user sent 
        $data = $request->all();
        // create article with data and store in DB
        // and return it as JSON
        // automatically gets 201 status as it's a POST request
        $card = Card::create($data);

        return new CardResource($article);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }
    public function show (Card $card)
    {
        // just return the card
        // return $card;
        return new CardResource($card);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    public function update(CardRequest $request, Card $card)
    {
        //     // get the request data
        // $data = $request->all();
        // // update the article using the fill method // then save it to the database $article->fill($data)->save();
        //     // return the updated version
        // return $card;

        $card = Card::find($id); 

        $data = $request->all(); 

        $card->fill($data)->save();

        return new CardResource($card);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
    public function destroy(Card $card)
    {
        // delete the article from the DB
        $card->delete();
        // use a 204 code as there is no content in the response
        return response(null, 204);
    }
}
