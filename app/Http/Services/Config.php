<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author sohail
 */

namespace App\Http\Services;

use App\Package;
use App\HostProperty;
use App\User;
use App\Complaint;
use App\Transaction;
use App\AgentLocation;

class Config
{
    use \App\Http\Traits\CommonService;
    protected function getUserById($id)
    {
        $user = User::where('id', $id)->whereNotIn("status", ["D"])->first();
        return !empty($user) ? $user : [];
    }

    protected function getInputs($request)
    {
        if (isset($request->inputs)) {
            return $request->inputs;
        } else {
            return $request->all();
        }
    }

    public function getPackageModel()
    {
        return new Package();
    }

    public function getUserModel()
    {
        return new User();
    }

    public function getPropertyModel()
    {
        return new HostProperty();
    }

    public function getComplaintModel()
    {
        return new Complaint();
    }

    public function getTransactionModel()
    {
        return new Transaction();
    }

    public function getAgentLocationModel()
    {
        return new AgentLocation();
    }
}
