<?php

namespace ccxt;

// PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
// https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code

use Exception; // a common import
use \ccxt\ExchangeError;
use \ccxt\ArgumentsRequired;

class wazirx extends Exchange {

    public function describe() {
        return $this->deep_extend(parent::describe(), array(
            'id' => 'wazirx',
            'name' => 'WazirX',
            'countries' => array( 'IN' ),
            'version' => 'v2',
            'rateLimit' => 1000,
            'has' => array(
                'CORS' => false,
                'spot' => true,
                'margin' => null, // has but unimplemented
                'swap' => false,
                'future' => false,
                'option' => false,
                'cancelAllOrders' => true,
                'cancelOrder' => true,
                'createOrder' => true,
                'createStopLimitOrder' => true,
                'createStopMarketOrder' => true,
                'createStopOrder' => true,
                'fetchBalance' => true,
                'fetchBidsAsks' => false,
                'fetchClosedOrders' => false,
                'fetchCurrencies' => false,
                'fetchDepositAddress' => false,
                'fetchDepositAddressesByNetwork' => false,
                'fetchDeposits' => true,
                'fetchFundingHistory' => false,
                'fetchFundingRate' => false,
                'fetchFundingRateHistory' => false,
                'fetchFundingRates' => false,
                'fetchIndexOHLCV' => false,
                'fetchMarginMode' => false,
                'fetchMarkets' => true,
                'fetchMarkOHLCV' => false,
                'fetchMyTrades' => false,
                'fetchOHLCV' => false,
                'fetchOpenInterestHistory' => false,
                'fetchOpenOrders' => true,
                'fetchOrder' => true,
                'fetchOrderBook' => true,
                'fetchOrders' => true,
                'fetchPositionMode' => false,
                'fetchPremiumIndexOHLCV' => false,
                'fetchStatus' => true,
                'fetchTicker' => true,
                'fetchTickers' => true,
                'fetchTime' => true,
                'fetchTrades' => true,
                'fetchTradingFee' => false,
                'fetchTradingFees' => false,
                'fetchTransactionFees' => false,
                'fetchTransactions' => false,
                'fetchTransfers' => false,
                'fetchWithdrawals' => false,
                'transfer' => false,
                'withdraw' => false,
            ),
            'urls' => array(
                'logo' => 'https://user-images.githubusercontent.com/1294454/148647666-c109c20b-f8ac-472f-91c3-5f658cb90f49.jpeg',
                'api' => array(
                    'rest' => 'https://api.wazirx.com/sapi/v1',
                ),
                'www' => 'https://wazirx.com',
                'doc' => 'https://docs.wazirx.com/#public-rest-api-for-wazirx',
                'fees' => 'https://wazirx.com/fees',
                'referral' => 'https://wazirx.com/invite/k7rrnks5',
            ),
            'api' => array(
                'public' => array(
                    'get' => array(
                        'exchangeInfo' => 1,
                        'depth' => 1,
                        'ping' => 1,
                        'systemStatus' => 1,
                        'tickers/24hr' => 1,
                        'ticker/24hr' => 1,
                        'time' => 1,
                        'trades' => 1,
                    ),
                ),
                'private' => array(
                    'get' => array(
                        'account' => 1,
                        'allOrders' => 1,
                        'funds' => 1,
                        'historicalTrades' => 1,
                        'openOrders' => 1,
                        'order' => 1,
                        'myTrades' => 1,
                    ),
                    'post' => array(
                        'order' => 1,
                        'order/test' => 1,
                    ),
                    'delete' => array(
                        'order' => 1,
                        'openOrders' => 1,
                    ),
                ),
            ),
            'fees' => array(
                'WRX' => array( 'maker' => $this->parse_number('0.0'), 'taker' => $this->parse_number('0.0') ),
            ),
            'precisionMode' => TICK_SIZE,
            'exceptions' => array(
                'exact' => array(
                    '-1121' => '\\ccxt\\BadSymbol', // array( "code" => -1121, "message" => "Invalid symbol." )
                    '1999' => '\\ccxt\\BadRequest', // array("code":1999,"message":"symbol is missing, symbol does not have a valid value") message varies depending on the error
                    '2002' => '\\ccxt\\InsufficientFunds', // array("code":2002,"message":"Not enough USDT balance to execute this order")
                    '2005' => '\\ccxt\\BadRequest', // array("code":2005,"message":"Signature is incorrect.")
                    '2078' => '\\ccxt\\PermissionDenied', // array("code":2078,"message":"Permission denied.")
                    '2098' => '\\ccxt\\BadRequest', // array("code":2098,"message":"Request out of receiving window.")
                    '2031' => '\\ccxt\\InvalidOrder', // array("code":2031,"message":"Minimum buy amount must be worth 2.0 USDT")
                    '2113' => '\\ccxt\\BadRequest', // array("code":2113,"message":"RecvWindow must be in range 1..60000")
                    '2115' => '\\ccxt\\BadRequest', // array("code":2115,"message":"Signature not found.")
                    '2136' => '\\ccxt\\RateLimitExceeded', // array("code":2136,"message":"Too many api request")
                    '94001' => '\\ccxt\\InvalidOrder', // array("code":94001,"message":"Stop price not found.")
                ),
            ),
            'options' => array(
                // 'fetchTradesMethod' => 'privateGetHistoricalTrades',
                'recvWindow' => 10000,
            ),
        ));
    }

    public function fetch_markets($params = array ()) {
        /**
         * retrieves data on all $markets for wazirx
         * @param {array} $params extra parameters specific to the exchange api endpoint
         * @return {[array]} an array of objects representing $market data
         */
        $response = $this->publicGetExchangeInfo ($params);
        //
        // {
        //     "timezone":"UTC",
        //     "serverTime":1641336850932,
        //     "symbols":array(
        //     {
        //         "symbol":"btcinr",
        //         "status":"trading",
        //         "baseAsset":"btc",
        //         "quoteAsset":"inr",
        //         "baseAssetPrecision":5,
        //         "quoteAssetPrecision":0,
        //         "orderTypes":[
        //             "limit",
        //             "stop_limit"
        //         ),
        //         "isSpotTradingAllowed":true,
        //         "filters":array(
        //             array(
        //                 "filterType":"PRICE_FILTER",
        //                 "minPrice":"1",
        //                 "tickSize":"1"
        //             }
        //         )
        //     ),
        //
        $markets = $this->safe_value($response, 'symbols', array());
        $result = array();
        for ($i = 0; $i < count($markets); $i++) {
            $market = $markets[$i];
            $id = $this->safe_string($market, 'symbol');
            $baseId = $this->safe_string($market, 'baseAsset');
            $quoteId = $this->safe_string($market, 'quoteAsset');
            $base = $this->safe_currency_code($baseId);
            $quote = $this->safe_currency_code($quoteId);
            $isSpot = $this->safe_value($market, 'isSpotTradingAllowed');
            $filters = $this->safe_value($market, 'filters');
            $minPrice = null;
            for ($j = 0; $j < count($filters); $j++) {
                $filter = $filters[$j];
                $filterType = $this->safe_string($filter, 'filterType');
                if ($filterType === 'PRICE_FILTER') {
                    $minPrice = $this->safe_number($filter, 'minPrice');
                }
            }
            $fee = $this->safe_value($this->fees, $quote, array());
            $takerString = $this->safe_string($fee, 'taker', '0.2');
            $takerString = Precise::string_div($takerString, '100');
            $makerString = $this->safe_string($fee, 'maker', '0.2');
            $makerString = Precise::string_div($makerString, '100');
            $status = $this->safe_string($market, 'status');
            $result[] = array(
                'id' => $id,
                'symbol' => $base . '/' . $quote,
                'base' => $base,
                'quote' => $quote,
                'settle' => null,
                'baseId' => $baseId,
                'quoteId' => $quoteId,
                'settleId' => null,
                'type' => 'spot',
                'spot' => $isSpot,
                'margin' => false,
                'swap' => false,
                'future' => false,
                'option' => false,
                'active' => ($status === 'trading'),
                'contract' => false,
                'linear' => null,
                'inverse' => null,
                'taker' => $this->parse_number($takerString),
                'maker' => $this->parse_number($makerString),
                'contractSize' => null,
                'expiry' => null,
                'expiryDatetime' => null,
                'strike' => null,
                'optionType' => null,
                'precision' => array(
                    'amount' => $this->parse_number($this->parse_precision($this->safe_string($market, 'baseAssetPrecision'))),
                    'price' => $this->parse_number($this->parse_precision($this->safe_string($market, 'quoteAssetPrecision'))),
                ),
                'limits' => array(
                    'leverage' => array(
                        'min' => null,
                        'max' => null,
                    ),
                    'price' => array(
                        'min' => $minPrice,
                        'max' => null,
                    ),
                    'amount' => array(
                        'min' => null,
                        'max' => null,
                    ),
                    'cost' => array(
                        'min' => null,
                        'max' => null,
                    ),
                ),
                'info' => $market,
            );
        }
        return $result;
    }

    public function fetch_order_book($symbol, $limit = null, $params = array ()) {
        /**
         * fetches information on open orders with bid (buy) and ask (sell) prices, volumes and other data
         * @param {string} $symbol unified $symbol of the $market to fetch the order book for
         * @param {int|null} $limit the maximum amount of order book entries to return
         * @param {array} $params extra parameters specific to the wazirx api endpoint
         * @return {array} A dictionary of {@link https://docs.ccxt.com/en/latest/manual.html#order-book-structure order book structures} indexed by $market symbols
         */
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'symbol' => $market['id'],
        );
        if ($limit !== null) {
            $request['limit'] = $limit; // [1, 5, 10, 20, 50, 100, 500, 1000]
        }
        $response = $this->publicGetDepth (array_merge($request, $params));
        //
        //     {
        //          "timestamp":1559561187,
        //          "asks":[
        //                     ["8540.0","1.5"],
        //                     ["8541.0","0.0042"]
        //                 ],
        //          "bids":[
        //                     ["8530.0","0.8814"],
        //                     ["8524.0","1.4"]
        //                 ]
        //      }
        //
        $timestamp = $this->safe_integer($response, 'timestamp');
        return $this->parse_order_book($response, $symbol, $timestamp);
    }

    public function fetch_ticker($symbol, $params = array ()) {
        /**
         * fetches a price $ticker, a statistical calculation with the information calculated over the past 24 hours for a specific $market
         * @param {string} $symbol unified $symbol of the $market to fetch the $ticker for
         * @param {array} $params extra parameters specific to the wazirx api endpoint
         * @return {array} a {@link https://docs.ccxt.com/en/latest/manual.html#$ticker-structure $ticker structure}
         */
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'symbol' => $market['id'],
        );
        $ticker = $this->publicGetTicker24hr (array_merge($request, $params));
        //
        // {
        //     "symbol":"wrxinr",
        //     "baseAsset":"wrx",
        //     "quoteAsset":"inr",
        //     "openPrice":"94.77",
        //     "lowPrice":"92.7",
        //     "highPrice":"95.17",
        //     "lastPrice":"94.03",
        //     "volume":"1118700.0",
        //     "bidPrice":"94.02",
        //     "askPrice":"94.03",
        //     "at":1641382455000
        // }
        //
        return $this->parse_ticker($ticker, $market);
    }

    public function fetch_tickers($symbols = null, $params = array ()) {
        /**
         * fetches price $tickers for multiple markets, statistical calculations with the information calculated over the past 24 hours each market
         * @param {[string]|null} $symbols unified $symbols of the markets to fetch the $ticker for, all market $tickers are returned if not assigned
         * @param {array} $params extra parameters specific to the wazirx api endpoint
         * @return {array} an array of {@link https://docs.ccxt.com/en/latest/manual.html#$ticker-structure $ticker structures}
         */
        $this->load_markets();
        $tickers = $this->publicGetTickers24hr ();
        //
        // array(
        //     {
        //        "symbol":"btcinr",
        //        "baseAsset":"btc",
        //        "quoteAsset":"inr",
        //        "openPrice":"3698486",
        //        "lowPrice":"3641155.0",
        //        "highPrice":"3767999.0",
        //        "lastPrice":"3713212.0",
        //        "volume":"254.11582",
        //        "bidPrice":"3715021.0",
        //        "askPrice":"3715022.0",
        //     }
        //     ...
        // )
        //
        $result = array();
        for ($i = 0; $i < count($tickers); $i++) {
            $ticker = $tickers[$i];
            $parsedTicker = $this->parse_ticker($ticker);
            $symbol = $parsedTicker['symbol'];
            $result[$symbol] = $parsedTicker;
        }
        return $result;
    }

    public function fetch_trades($symbol, $since = null, $limit = null, $params = array ()) {
        /**
         * get the list of most recent trades for a particular $symbol
         * @param {string} $symbol unified $symbol of the $market to fetch trades for
         * @param {int|null} $since timestamp in ms of the earliest trade to fetch
         * @param {int|null} $limit the maximum amount of trades to fetch
         * @param {array} $params extra parameters specific to the wazirx api endpoint
         * @return {[array]} a list of ~@link https://docs.ccxt.com/en/latest/manual.html?#public-trades trade structures~
         */
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'symbol' => $market['id'],
        );
        if ($limit !== null) {
            $request['limit'] = $limit; // Default 500; max 1000.
        }
        $method = $this->safe_string($this->options, 'fetchTradesMethod', 'publicGetTrades');
        $response = $this->$method (array_merge($request, $params));
        // array(
        //     array(
        //         "id":322307791,
        //         "price":"93.7",
        //         "qty":"0.7",
        //         "quoteQty":"65.59",
        //         "time":1641386701000,
        //         "isBuyerMaker":false
        //     ),
        // )
        return $this->parse_trades($response, $market, $since, $limit);
    }

    public function parse_trade($trade, $market = null) {
        //
        //     {
        //         "id":322307791,
        //         "price":"93.7",
        //         "qty":"0.7",
        //         "quoteQty":"65.59",
        //         "time":1641386701000,
        //         "isBuyerMaker":false
        //     }
        //
        $id = $this->safe_string($trade, 'id');
        $timestamp = $this->safe_integer($trade, 'time');
        $datetime = $this->iso8601($timestamp);
        $market = $this->safe_market(null, $market);
        $isBuyerMaker = $this->safe_value($trade, 'isBuyerMaker');
        $side = $isBuyerMaker ? 'sell' : 'buy';
        $price = $this->safe_number($trade, 'price');
        $amount = $this->safe_number($trade, 'qty');
        $cost = $this->safe_number($trade, 'quoteQty');
        return $this->safe_trade(array(
            'info' => $trade,
            'id' => $id,
            'timestamp' => $timestamp,
            'datetime' => $datetime,
            'symbol' => $market['symbol'],
            'order' => $id,
            'type' => null,
            'side' => $side,
            'takerOrMaker' => null,
            'price' => $price,
            'amount' => $amount,
            'cost' => $cost,
            'fee' => null,
        ), $market);
    }

    public function fetch_status($params = array ()) {
        /**
         * the latest known information on the availability of the exchange API
         * @param {array} $params extra parameters specific to the wazirx api endpoint
         * @return {array} a {@link https://docs.ccxt.com/en/latest/manual.html#exchange-$status-structure $status structure}
         */
        $response = $this->publicGetSystemStatus ($params);
        //
        //     {
        //         "status":"normal", // normal, system maintenance
        //         "message":"System is running normally."
        //     }
        //
        $status = $this->safe_string($response, 'status');
        return array(
            'status' => ($status === 'normal') ? 'ok' : 'maintenance',
            'updated' => null,
            'eta' => null,
            'url' => null,
            'info' => $response,
        );
    }

    public function fetch_time($params = array ()) {
        /**
         * fetches the current integer timestamp in milliseconds from the exchange server
         * @param {array} $params extra parameters specific to the wazirx api endpoint
         * @return {int} the current integer timestamp in milliseconds from the exchange server
         */
        $response = $this->publicGetTime ($params);
        //
        //     {
        //         "serverTime":1635467280514
        //     }
        //
        return $this->safe_integer($response, 'serverTime');
    }

    public function parse_ticker($ticker, $market = null) {
        //
        //     {
        //        "symbol":"btcinr",
        //        "baseAsset":"btc",
        //        "quoteAsset":"inr",
        //        "openPrice":"3698486",
        //        "lowPrice":"3641155.0",
        //        "highPrice":"3767999.0",
        //        "lastPrice":"3713212.0",
        //        "volume":"254.11582", // base volume
        //        "bidPrice":"3715021.0",
        //        "askPrice":"3715022.0",
        //        "at":1641382455000 // only on fetchTicker
        //     }
        //
        $marketId = $this->safe_string($ticker, 'symbol');
        $market = $this->safe_market($marketId, $market);
        $symbol = $market['symbol'];
        $last = $this->safe_string($ticker, 'lastPrice');
        $open = $this->safe_string($ticker, 'openPrice');
        $high = $this->safe_string($ticker, 'highPrice');
        $low = $this->safe_string($ticker, 'lowPrice');
        $baseVolume = $this->safe_string($ticker, 'volume');
        $bid = $this->safe_string($ticker, 'bidPrice');
        $ask = $this->safe_string($ticker, 'askPrice');
        $timestamp = $this->safe_integer($ticker, 'at');
        return $this->safe_ticker(array(
            'symbol' => $symbol,
            'timestamp' => $timestamp,
            'datetime' => $this->iso8601($timestamp),
            'high' => $high,
            'low' => $low,
            'bid' => $bid,
            'bidVolume' => null,
            'ask' => $ask,
            'askVolume' => null,
            'vwap' => null,
            'open' => $open,
            'close' => $last,
            'last' => $last,
            'previousClose' => null,
            'change' => null,
            'percentage' => null,
            'average' => null,
            'baseVolume' => $baseVolume,
            'quoteVolume' => null,
            'info' => $ticker,
        ), $market);
    }

    public function parse_balance($response) {
        $result = array( );
        for ($i = 0; $i < count($response); $i++) {
            $balance = $response[$i];
            $id = $this->safe_string($balance, 'asset');
            $code = $this->safe_currency_code($id);
            $account = $this->account();
            $account['free'] = $this->safe_string($balance, 'free');
            $account['used'] = $this->safe_string($balance, 'locked');
            $result[$code] = $account;
        }
        return $this->safe_balance($result);
    }

    public function fetch_balance($params = array ()) {
        /**
         * query for balance and get the amount of funds available for trading or funds locked in orders
         * @param {array} $params extra parameters specific to the wazirx api endpoint
         * @return {array} a ~@link https://docs.ccxt.com/en/latest/manual.html?#balance-structure balance structure~
         */
        $this->load_markets();
        $response = $this->privateGetFunds ($params);
        //
        // array(
        //       array(
        //          "asset":"inr",
        //          "free":"0.0",
        //          "locked":"0.0"
        //       ),
        // )
        //
        return $this->parse_balance($response);
    }

    public function fetch_orders($symbol = null, $since = null, $limit = null, $params = array ()) {
        /**
         * fetches information on multiple $orders made by the user
         * @param {string} $symbol unified $market $symbol of the $market $orders were made in
         * @param {int|null} $since the earliest time in ms to fetch $orders for
         * @param {int|null} $limit the maximum number of  orde structures to retrieve
         * @param {array} $params extra parameters specific to the wazirx api endpoint
         * @return {[array]} a list of {@link https://docs.ccxt.com/en/latest/manual.html#order-structure order structures}
         */
        if ($symbol === null) {
            throw new ArgumentsRequired($this->id . ' fetchOrders() requires a `$symbol` argument');
        }
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'symbol' => $market['id'],
        );
        if ($since !== null) {
            $request['startTime'] = $since;
        }
        if ($limit !== null) {
            $request['limit'] = $limit;
        }
        $response = $this->privateGetAllOrders (array_merge($request, $params));
        //
        //   array(
        //       array(
        //           "id" => 28,
        //           "symbol" => "wrxinr",
        //           "price" => "9293.0",
        //           "origQty" => "10.0",
        //           "executedQty" => "8.2",
        //           "status" => "cancel",
        //           "type" => "limit",
        //           "side" => "sell",
        //           "createdTime" => 1499827319559,
        //           "updatedTime" => 1499827319559
        //       ),
        //       {
        //           "id" => 30,
        //           "symbol" => "wrxinr",
        //           "price" => "9293.0",
        //           "stopPrice" => "9200.0",
        //           "origQty" => "10.0",
        //           "executedQty" => "0.0",
        //           "status" => "cancel",
        //           "type" => "stop_limit",
        //           "side" => "sell",
        //           "createdTime" => 1499827319559,
        //           "updatedTime" => 1507725176595
        //       }
        //   )
        //
        $orders = $this->parse_orders($response, $market, $since, $limit);
        $orders = $this->filter_by($orders, 'symbol', $symbol);
        return $orders;
    }

    public function fetch_open_orders($symbol = null, $since = null, $limit = null, $params = array ()) {
        /**
         * fetch all unfilled currently open $orders
         * @param {string|null} $symbol unified $market $symbol
         * @param {int|null} $since the earliest time in ms to fetch open $orders for
         * @param {int|null} $limit the maximum number of  open $orders structures to retrieve
         * @param {array} $params extra parameters specific to the wazirx api endpoint
         * @return {[array]} a list of {@link https://docs.ccxt.com/en/latest/manual.html#order-structure order structures}
         */
        $this->load_markets();
        $request = array();
        $market = null;
        if ($symbol !== null) {
            $market = $this->market($symbol);
            $request['symbol'] = $market['id'];
        }
        $response = $this->privateGetOpenOrders (array_merge($request, $params));
        // array(
        //     array(
        //         "id" => 28,
        //         "symbol" => "wrxinr",
        //         "price" => "9293.0",
        //         "origQty" => "10.0",
        //         "executedQty" => "8.2",
        //         "status" => "cancel",
        //         "type" => "limit",
        //         "side" => "sell",
        //         "createdTime" => 1499827319559,
        //         "updatedTime" => 1499827319559
        //     ),
        //     {
        //         "id" => 30,
        //         "symbol" => "wrxinr",
        //         "price" => "9293.0",
        //         "stopPrice" => "9200.0",
        //         "origQty" => "10.0",
        //         "executedQty" => "0.0",
        //         "status" => "cancel",
        //         "type" => "stop_limit",
        //         "side" => "sell",
        //         "createdTime" => 1499827319559,
        //         "updatedTime" => 1507725176595
        //     }
        // )
        $orders = $this->parse_orders($response, $market, $since, $limit);
        return $orders;
    }

    public function cancel_all_orders($symbol = null, $params = array ()) {
        /**
         * cancel all open orders in a $market
         * @param {string} $symbol unified $market $symbol of the $market to cancel orders in
         * @param {array} $params extra parameters specific to the wazirx api endpoint
         * @return {[array]} a list of {@link https://docs.ccxt.com/en/latest/manual.html#order-structure order structures}
         */
        if ($symbol === null) {
            throw new ArgumentsRequired($this->id . ' cancelAllOrders() requires a `$symbol` argument');
        }
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'symbol' => $market['id'],
        );
        return $this->privateDeleteOpenOrders (array_merge($request, $params));
    }

    public function cancel_order($id, $symbol = null, $params = array ()) {
        /**
         * cancels an open order
         * @param {string} $id order $id
         * @param {string} $symbol unified $symbol of the $market the order was made in
         * @param {array} $params extra parameters specific to the wazirx api endpoint
         * @return {array} An {@link https://docs.ccxt.com/en/latest/manual.html#order-structure order structure}
         */
        if ($symbol === null) {
            throw new ArgumentsRequired($this->id . ' cancelOrder() requires a `$symbol` argument');
        }
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'symbol' => $market['id'],
            'orderId' => $id,
        );
        $response = $this->privateDeleteOrder (array_merge($request, $params));
        return $this->parse_order($response);
    }

    public function create_order($symbol, $type, $side, $amount, $price = null, $params = array ()) {
        /**
         * create a trade order
         * @param {string} $symbol unified $symbol of the $market to create an order in
         * @param {string} $type 'market' or 'limit'
         * @param {string} $side 'buy' or 'sell'
         * @param {float} $amount how much of currency you want to trade in units of base currency
         * @param {float|null} $price the $price at which the order is to be fullfilled, in units of the quote currency, ignored in $market orders
         * @param {array} $params extra parameters specific to the wazirx api endpoint
         * @return {array} an {@link https://docs.ccxt.com/en/latest/manual.html#order-structure order structure}
         */
        $type = strtolower($type);
        if (($type !== 'limit') && ($type !== 'stop_limit')) {
            throw new ExchangeError($this->id . ' createOrder() supports limit and stop_limit orders only');
        }
        if ($price === null) {
            throw new ExchangeError($this->id . ' createOrder() requires a $price argument');
        }
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'symbol' => $market['id'],
            'side' => $side,
            'quantity' => $amount,
            'type' => 'limit',
        );
        $request['price'] = $this->price_to_precision($symbol, $price);
        $stopPrice = $this->safe_string($params, 'stopPrice');
        if ($stopPrice !== null) {
            $request['type'] = 'stop_limit';
        }
        $response = $this->privatePostOrder (array_merge($request, $params));
        // {
        //     "id" => 28,
        //     "symbol" => "wrxinr",
        //     "price" => "9293.0",
        //     "origQty" => "10.0",
        //     "executedQty" => "8.2",
        //     "status" => "wait",
        //     "type" => "limit",
        //     "side" => "sell",
        //     "createdTime" => 1499827319559,
        //     "updatedTime" => 1499827319559
        // }
        return $this->parse_order($response, $market);
    }

    public function parse_order($order, $market = null) {
        // array(
        //     "id":1949417813,
        //     "symbol":"ltcusdt",
        //     "type":"limit",
        //     "side":"sell",
        //     "status":"done",
        //     "price":"146.2",
        //     "origQty":"0.05",
        //     "executedQty":"0.05",
        //     "createdTime":1641252564000,
        //     "updatedTime":1641252564000
        // ),
        $created = $this->safe_integer($order, 'createdTime');
        $updated = $this->safe_integer($order, 'updatedTime');
        $marketId = $this->safe_string($order, 'symbol');
        $symbol = $this->safe_symbol($marketId, $market);
        $amount = $this->safe_string($order, 'quantity');
        $filled = $this->safe_string($order, 'executedQty');
        $status = $this->parse_order_status($this->safe_string($order, 'status'));
        $id = $this->safe_string($order, 'id');
        $price = $this->safe_string($order, 'price');
        $type = $this->safe_string_lower($order, 'type');
        $side = $this->safe_string_lower($order, 'side');
        return $this->safe_order(array(
            'info' => $order,
            'id' => $id,
            'clientOrderId' => null,
            'timestamp' => $created,
            'datetime' => $this->iso8601($created),
            'lastTradeTimestamp' => $updated,
            'status' => $status,
            'symbol' => $symbol,
            'type' => $type,
            'timeInForce' => null,
            'postOnly' => null,
            'side' => $side,
            'price' => $price,
            'amount' => $amount,
            'filled' => $filled,
            'remaining' => null,
            'cost' => null,
            'fee' => null,
            'average' => null,
            'trades' => array(),
        ), $market);
    }

    public function parse_order_status($status) {
        $statuses = array(
            'wait' => 'open',
            'done' => 'closed',
            'cancel' => 'canceled',
        );
        return $this->safe_string($statuses, $status, $status);
    }

    public function sign($path, $api = 'public', $method = 'GET', $params = array (), $headers = null, $body = null) {
        $url = $this->urls['api']['rest'] . '/' . $path;
        if ($api === 'public') {
            if ($params) {
                $url .= '?' . $this->urlencode($params);
            }
        }
        if ($api === 'private') {
            $this->check_required_credentials();
            $timestamp = $this->milliseconds();
            $data = array_merge(array( 'recvWindow' => $this->options['recvWindow'], 'timestamp' => $timestamp ), $params);
            $data = $this->keysort($data);
            $signature = $this->hmac($this->encode($this->urlencode($data)), $this->encode($this->secret), 'sha256');
            $url .= '?' . $this->urlencode($data);
            $url .= '&$signature=' . $signature;
            $headers = array(
                'Content-Type' => 'application/x-www-form-urlencoded',
                'X-Api-Key' => $this->apiKey,
            );
        }
        return array( 'url' => $url, 'method' => $method, 'body' => $body, 'headers' => $headers );
    }

    public function handle_errors($code, $reason, $url, $method, $headers, $body, $response, $requestHeaders, $requestBody) {
        //
        // array("code":2098,"message":"Request out of receiving window.")
        //
        if ($response === null) {
            return;
        }
        $errorCode = $this->safe_string($response, 'code');
        if ($errorCode !== null) {
            $feedback = $this->id . ' ' . $body;
            $this->throw_exactly_matched_exception($this->exceptions['exact'], $errorCode, $feedback);
            throw new ExchangeError($feedback);
        }
    }
}