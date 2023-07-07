<?php
namespace Core\Domain\Validation;

use Core\Domain\Exception\ParamsFormatException;
use Core\Domain\Exception\ParamsNullException;

// use Illuminate\Support\Facades\Storage;

class ParamsValidation
{

    public function validation(object $params)
    {
        $this->validateSpeedUpSettings($params->speedUpSettings ?? null);
        $this->validateGatherSettings($params->gatherSettings ?? null);
        $this->validateRallySettings($params->rallySettings ?? null);
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

    public function validateNull($value, $nameField)
    {
        if (is_null($value)) {
            throw new ParamsFormatException("\"{$nameField}\" can't be null.");
        }
    }

    protected function validateInteger($value, $nameField)
    {
        if (!is_int($value)) {
            throw new ParamsFormatException("\"{$nameField}\" must be an integer value.");
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
}