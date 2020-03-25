<?php


namespace App\Http\Controllers;


use App\Entities\Vote;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function getVotes(){
        $votes = Vote::paginate(15);
        return response()->json($votes);
    }
    public function postVote(Request $request){
        $this->validate($request,[
            'image' => 'required|string',
            'success' => 'required',
            'data' => 'required'
        ]);
        $data = $request->all();
        $data['ip'] = sha1("he4rtdevs" . $request->getClientIp());
        $vote = Vote::create($data);
        return response()->json($vote);
    }
}
