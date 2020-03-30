<?php


namespace App\Http\Controllers;


use App\Entities\Symbol;
use App\Entities\Vote;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function getVotes()
    {
        $votes = Vote::paginate(15);
        return response()->json($votes);
    }

    public function postVote(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|string',
            'success' => 'required',
            'data' => 'required'
        ]);

        $data = $request->all();
        $data['ip'] = sha1("he4rtdevs" . $request->getClientIp());

        $vote = Vote::create($data);
        if ($data['success']) {
            $symbol = Symbol::where('name', $data['image'])->first();
            if (!$symbol) {
               $symbol = Symbol::create(['name' => $data['image']]);
            }
            unset($data['image']);
            $symbol->data()->create($data['data'],true);
        }
        return response()->json($vote);
    }
}
