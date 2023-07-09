<?php
namespace Core\Domain\Validation;

use Core\Domain\Exception\ParamsFormatException;
use Core\Domain\Exception\ParamsNullException;

// use Illuminate\Support\Facades\Storage;

class ParamsValidation
{

    public function validation(object $params)
    {
        $this->validateConnectionSettings($params->connectionSettings ?? null);
        
        $this->validateSpeedUpSettings($params->speedUpSettings ?? null);
        $this->validateGatherSettings($params->gatherSettings ?? null);
        $this->validateRallySettings($params->rallySettings ?? null);
        $this->validateCargoShipSettings($params->cargoShipSettings ?? null);
        $this->validateSupplySettings($params->supplySettings ?? null);

        $this->validateHeroSettings($params->heroSettings ?? null);
        $this->validateHeroStageSettings($params->heroStageSettings ?? null);
        $this->validateArenaSettings($params->arenaSettings ?? null);
        $this->validateBuildSettings($params->buildSettings ?? null);
    }

    protected function validateSupplySettings($supplySettings)
    {
        $this->validateBoolean($supplySettings->sendResources, 'supplySettings->sendResources');
        $this->validateBoolean($supplySettings->useBagResource, 'supplySettings->useBagResource');
        $this->validateBoolean($supplySettings->randomizeSpeed, 'supplySettings->randomizeSpeed');
        
        $this->validateFloat($supplySettings->supplySpeed, 'supplySettings->supplySpeed');
        $this->validateInteger($supplySettings->maxTravelTime, 'supplySettings->maxTravelTime');
        $this->validateString($supplySettings->playerToSend, 'supplySettings->playerToSend');

        $this->validateIntegerArray($supplySettings->reservedRss, 5, 'supplySettings->reservedRss');
        $this->validateIntegerArray($supplySettings->supplyMin, 5, 'supplySettings->supplyMin');
        $this->validateIntegerArray($supplySettings->reservedBagRss, 5, 'supplySettings->reservedBagRss');
        
        $this->validateBooleanArray($supplySettings->typesToSend, 5, 'supplySettings->typesToSend');
        $this->validateBooleanArray($supplySettings->bagTypesToSend, 5, 'supplySettings->bagTypesToSend');
    }

    protected function validateCargoShipSettings($cargoShipSettings)
    {
        $this->validateBoolean($cargoShipSettings->allowTrading, 'cargoShipSettings->allowTrading');
        $this->validateBoolean($cargoShipSettings->tradeFood, 'cargoShipSettings->tradeFood');
        $this->validateBoolean($cargoShipSettings->tradeStone, 'cargoShipSettings->tradeStone');
        $this->validateBoolean($cargoShipSettings->tradeWood, 'cargoShipSettings->tradeWood');
        $this->validateBoolean($cargoShipSettings->tradeOre, 'cargoShipSettings->tradeOre');
        $this->validateBoolean($cargoShipSettings->tradeGold, 'cargoShipSettings->tradeGold');
        $this->validateBoolean($cargoShipSettings->ignoreFood, 'cargoShipSettings->ignoreFood');
        $this->validateBoolean($cargoShipSettings->ignoreStone, 'cargoShipSettings->ignoreStone');
        $this->validateBoolean($cargoShipSettings->ignoreWood, 'cargoShipSettings->ignoreWood');
        $this->validateBoolean($cargoShipSettings->ignoreOre, 'cargoShipSettings->ignoreOre');
        $this->validateBoolean($cargoShipSettings->ignoreGold, 'cargoShipSettings->ignoreGold');
        $this->validateBoolean($cargoShipSettings->ignoreAnima, 'cargoShipSettings->ignoreAnima');
        $this->validateBoolean($cargoShipSettings->ignoreLunite, 'cargoShipSettings->ignoreLunite');
        $this->validateBoolean($cargoShipSettings->ignoreSpeedUp, 'cargoShipSettings->ignoreSpeedUp');
        $this->validateBoolean($cargoShipSettings->exchangeRssItemOnly, 'cargoShipSettings->exchangeRssItemOnly');
        $this->validateBoolean($cargoShipSettings->useRssFromBagIfNeeded, 'cargoShipSettings->useRssFromBagIfNeeded');
        
        $this->validateInteger($cargoShipSettings->exchangeMinQuality, 'cargoShipSettings->exchangeMinQuality');
    }

    protected function validateConnectionSettings($connectionSettings)
    {
        $this->validateString($connectionSettings->savedProxy, 'connectionSettings.savedProxy');
        
        $this->validateBoolean($connectionSettings->isTaiwan, 'connectionSettings.isTaiwan');
        $this->validateBoolean($connectionSettings->saveLogToFile, 'connectionSettings.saveLogToFile');
        $this->validateBoolean($connectionSettings->dontClearLog, 'connectionSettings.dontClearLog');
        $this->validateBoolean($connectionSettings->refreshKey, 'connectionSettings.refreshKey');
        $this->validateBoolean($connectionSettings->resetConnection, 'connectionSettings.resetConnection');
        $this->validateBoolean($connectionSettings->postToWebhook, 'connectionSettings.postToWebhook');
        $this->validateBoolean($connectionSettings->postKeyExpiry, 'connectionSettings.postKeyExpiry');
        $this->validateBoolean($connectionSettings->postStatusChange, 'connectionSettings.postStatusChange');
        $this->validateBoolean($connectionSettings->postScheduleChange, 'connectionSettings.postScheduleChange');
        $this->validateBoolean($connectionSettings->postOtherLogin, 'connectionSettings.postOtherLogin');
        $this->validateBoolean($connectionSettings->postRSSLimit, 'connectionSettings.postRSSLimit');
        
        $this->validateInteger($connectionSettings->reconnectTime, 'connectionSettings.reconnectTime');
        $this->validateInteger($connectionSettings->otherLoginTime, 'connectionSettings.otherLoginTime');
        $this->validateInteger($connectionSettings->workerSpeed, 'connectionSettings.workerSpeed');
        $this->validateInteger($connectionSettings->cmdInterval, 'connectionSettings.cmdInterval');
        $this->validateInteger($connectionSettings->resetTime, 'connectionSettings.resetTime');
        $this->validateInteger($connectionSettings->resetTimeBegin, 'connectionSettings.resetTimeBegin');
        $this->validateInteger($connectionSettings->logResetTime, 'connectionSettings.logResetTime');
    }

    public function validateGatherSettings($gatherSettings)
    {
        if (is_null($gatherSettings)) {
            throw new ParamsFormatException('"gather_settings" can\'t be null.');
        }

        $this->validateBoolean($gatherSettings->gatherResources, 'gatherSettings.gatherResources');
        $this->validateBoolean($gatherSettings->gatherLowestResources, 'gatherSettings.gatherLowestResources');
        $this->validateBoolean($gatherSettings->ignoreLevelForGems, 'gatherSettings.ignoreLevelForGems');
        $this->validateBoolean($gatherSettings->clearTiles, 'gatherSettings.clearTiles');
        $this->validateBoolean($gatherSettings->targetHigherLevel, 'gatherSettings.targetHigherLevel');
        $this->validateBoolean($gatherSettings->leaveSpareArmy, 'gatherSettings.leaveSpareArmy');
        $this->validateBoolean($gatherSettings->recallCamps, 'gatherSettings.recallCamps');
        $this->validateBoolean($gatherSettings->useGatherGear, 'gatherSettings.useGatherGear');
        $this->validateBoolean($gatherSettings->useGatherSchedule, 'gatherSettings.useGatherSchedule');
        $this->validateBoolean($gatherSettings->ignoreLevel3GF, 'gatherSettings.ignoreLevel3GF');

        $this->validateInteger($gatherSettings->spareArmyAmount, 'gatherSettings.spareArmyAmount');
        $this->validateInteger($gatherSettings->maxArmysToSend, 'gatherSettings.maxArmysToSend');
        $this->validateInteger($gatherSettings->maxSearchArea, 'gatherSettings.maxSearchArea');
        $this->validateInteger($gatherSettings->maxWalkTime, 'gatherSettings.maxWalkTime');
        $this->validateInteger($gatherSettings->tileMinimum, 'gatherSettings.tileMinimum');
        $this->validateInteger($gatherSettings->sendingDelay, 'gatherSettings.sendingDelay');

        $this->validateBooleanArray($gatherSettings->levelToGather, 5, 'levelToGather');
        $this->validateBooleanArray($gatherSettings->typesToGather, 6, 'typesToGather');
        
    }

    public function validateSpeedUpSettings($speedUpSettings)
    {

        $this->validateNull($speedUpSettings, 'speedUpSettings');
        $this->validateBoolean($speedUpSettings->useSpeedUps, 'speedUpSettings.useSpeedUps');
        $this->validateBoolean($speedUpSettings->waitForHelp, 'speedUpSettings.waitForHelp');
        $this->validateBoolean($speedUpSettings->boostingMode, 'speedUpSettings.boostingMode');
        $this->validateBoolean($speedUpSettings->autoGearSpeedUp, 'speedUpSettings.autoGearSpeedUp');
        $this->validateBoolean($speedUpSettings->autoTrapSpeedUp, 'speedUpSettings.autoTrapSpeedUp');
        $this->validateBoolean($speedUpSettings->autoWallSpeedUp, 'speedUpSettings.autoWallSpeedUp');
        $this->validateBoolean($speedUpSettings->autoHealingSpeedUp, 'speedUpSettings.autoHealingSpeedUp');
        $this->validateBoolean($speedUpSettings->autoMergingSpeedUp, 'speedUpSettings.autoMergingSpeedUp');
        $this->validateBoolean($speedUpSettings->autoBuildingSpeedUp, 'speedUpSettings.autoBuildingSpeedUp');
        $this->validateBoolean($speedUpSettings->autoResearchSpeedUp, 'speedUpSettings.autoResearchSpeedUp');
        $this->validateBoolean($speedUpSettings->autoTrainingSpeedUp, 'speedUpSettings.autoTrainingSpeedUp');
        $this->validateBoolean($speedUpSettings->generalForBuildOnly, 'speedUpSettings.generalForBuildOnly');
        $this->validateBoolean($speedUpSettings->autoLunarGearSpeedUp, 'speedUpSettings.autoLunarGearSpeedUp');
        $this->validateBoolean($speedUpSettings->autoTrapRepairSpeedUp, 'speedUpSettings.autoTrapRepairSpeedUp');
        $this->validateBoolean($speedUpSettings->ignoreHomeKingdomRule, 'speedUpSettings.ignoreHomeKingdomRule');
        
        $this->validateTimeFormat($speedUpSettings->maxSpeedUpExcess, 'speedUpSettings.maxSpeedUpExcess');
    }

    protected function validateRallySettings($rallySettings)
    {
        $this->validateBoolean($rallySettings->joinRallies, 'rallySettings->joinRallies');
        $this->validateBoolean($rallySettings->craftEssences, 'rallySettings->craftEssences');
        $this->validateBoolean($rallySettings->dontFillRally, 'rallySettings->dontFillRally');
        $this->validateBoolean($rallySettings->noSiege, 'rallySettings->noSiege');
        $this->validateBoolean($rallySettings->noT5, 'rallySettings->noT5');
        $this->validateBoolean($rallySettings->oneType, 'rallySettings->oneType');
        $this->validateBoolean($rallySettings->addBuffers, 'rallySettings->addBuffers');
        $this->validateBoolean($rallySettings->keepEssSlotFree, 'rallySettings->keepEssSlotFree');
        $this->validateBoolean($rallySettings->checkLab, 'rallySettings->checkLab');

        $this->validateInteger($rallySettings->minEssenceLevel, 'rallySettings->minEssenceLevel');
        $this->validateInteger($rallySettings->rallyLimit, 'rallySettings->rallyLimit');
        $this->validateInteger($rallySettings->maxWalkTime , 'rallySettings->maxWalkTime');
        $this->validateInteger($rallySettings->rejoinWaitTime , 'rallySettings->rejoinWaitTime');
        $this->validateInteger($rallySettings->rallyTroopType, 'rallySettings->rallyTroopType');
        $this->validateInteger($rallySettings->maxRallyTime, 'rallySettings->maxRallyTime');

        $this->validateBooleanArray($rallySettings->levelToAttack, 6, 'rallySettings->levelToAttack');
    }

    protected function validateHeroSettings($heroSettings)
    {
        $this->validateBoolean($heroSettings->autoHireHeros, 'heroSettings->autoHireHeros');
        $this->validateBoolean($heroSettings->autoEnhanceHeros, 'heroSettings->autoEnhanceHeros');
        $this->validateBoolean($heroSettings->useLevelUpItems, 'heroSettings->useLevelUpItems');
        $this->validateBoolean($heroSettings->autoUpgradeHeros, 'heroSettings->autoUpgradeHeros');
        $this->validateBoolean($heroSettings->reviveDeadLeader, 'heroSettings->reviveDeadLeader');

        $this->validateBoolean($heroSettings->useBraveheartItems, 'heroSettings->useBraveheartItems');
    }
    
    protected function validateHeroStageSettings($heroStageSettings)
    {
        $this->validateBoolean($heroStageSettings->AutoAttackHeroStages, 'heroStageSettings->AutoAttackHeroStages');
        $this->validateBoolean($heroStageSettings->priorityMode, 'heroStageSettings->priorityMode');
        $this->validateBoolean($heroStageSettings->selectedChapter->QuickFightStage, 'heroStageSettings->selectedChapter->QuickFightStage');
        $this->validateBoolean($heroStageSettings->selectedChapter->useVipSweep, 'heroStageSettings->selectedChapter->useVipSweep');
        
        $this->validateInteger($heroStageSettings->attackStageType, 'heroStageSettings.attackStageType');
        $this->validateInteger($heroStageSettings->seqAttackStageType, 'heroStageSettings.seqAttackStageType');
    }

    protected function validateArenaSettings($arenaSettings)
    {
        $this->validateBoolean($arenaSettings->attackArena, 'arenaSettings->attackArena');
        $this->validateBoolean($arenaSettings->attackGuildmates, 'arenaSettings->attackGuildmates');
        $this->validateBoolean($arenaSettings->collectGems, 'arenaSettings->collectGems');
        $this->validateBoolean($arenaSettings->buyExtraAttempts, 'arenaSettings->buyExtraAttempts');
        
        $this->validateInteger($arenaSettings->attemptsToBuy, 'arenaSettings->attemptsToBuy');
        $this->validateInteger($arenaSettings->minWinChance, 'arenaSettings->minWinChance');
        $this->validateInteger($arenaSettings->maxWinChance, 'arenaSettings->maxWinChance');
        $this->validateInteger($arenaSettings->arenaHeroType, 'arenaSettings->arenaHeroType');
        $this->validateInteger($arenaSettings->arenaDefenderType, 'arenaSettings->arenaDefenderType');
    }


    protected function validateBuildSettings($buildSettings)
    {
        $this->validateBoolean($buildSettings->autoBuild, 'buildSettings->autoBuild');
        $this->validateBoolean($buildSettings->buildByLowestLevel, 'buildSettings->buildByLowestLevel');
        $this->validateBoolean($buildSettings->ignoreSpamTarget, 'buildSettings->ignoreSpamTarget');

        $this->validateInteger($buildSettings->buildPriority, 'buildSettings->buildPriority');
        $this->validateInteger($buildSettings->maxBuildLevel, 'buildSettings->maxBuildLevel');
        $this->validateInteger($buildSettings->spamTarget, 'buildSettings->spamTarget');
        
        $this->validateIntegerArrayWithoutSize($buildSettings->buildTarget, 'buildSettings->buildTarget');
    }


    public function validateNull($value, $nameField)
    {
        if (is_null($value)) {
            throw new ParamsFormatException("\"{$nameField}\" can't be null.");
        }
    }

    protected function validateString($value, $nameField)
    {
        if (!is_string($value)) {
            throw new ParamsFormatException("\"{$nameField}\" must be a string value.");
        }
    }

    protected function validateInteger($value, $nameField)
    {
        if (!is_int($value)) {
            throw new ParamsFormatException("\"{$nameField}\" must be an integer value.");
        }
    }

    protected function validateFloat($value, $nameField)
    {
        if (!is_numeric($value)) {
            throw new ParamsFormatException("\"{$nameField}\" must be an float value.");
        }
    }

    protected function validateBoolean($value, $nameField)
    {
        if (!is_bool($value)) {
            throw new ParamsFormatException("{$nameField} must be a bool");
        }
    }

    protected function validateTimeFormat($time, $name) {
        $formato = 'H:i:s';
        $timeConverted = strtotime($time);
    
        if ($timeConverted === false && date($formato, $timeConverted) !== $time) {
            new ParamsFormatException("{$name} must has HH:MM:SS");
        }
    }

    protected function validateBooleanArray(array $array, int $size, $nameField = "")
    {
        if (!is_array($array)
            || count($array) !== $size
        ) {
            throw new ParamsFormatException("\"{$nameField}\" must be an array with {$size} positions");
        }

        foreach($array as $item) {
            if (!is_bool($item)) {
                throw new ParamsFormatException("\"{$nameField}\" must be an array of booleans");
            }
        }
    }

    protected function validateIntegerArray(array $array, int $size, $nameField = "")
    {
        if (!is_array($array)
            || count($array) !== $size
        ) {
            throw new ParamsFormatException("\"{$nameField}\" must be an array with {$size} positions");
        }

        foreach($array as $item) {
            if (!is_int($item)) {
                throw new ParamsFormatException("\"{$nameField}\" must be an array of integer");
            }
        }
    }

    protected function validateIntegerArrayWithoutSize($arrayInteger, $nameField)
    {
        if (!is_array($arrayInteger)) {
            throw new ParamsFormatException("\"{$nameField}\" must be an array");
        }

        foreach($arrayInteger as $item) {
            if (!is_int($item)) {
                throw new ParamsFormatException("\"{$nameField}\" must be an array of integer");
            }
        }
    }
}