<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use ReflectionClass;

class ViewHelper
{
    /**
     * Get fillable fields from a model
     */
    public static function getModelFields($modelClass): array
    {
        if (is_string($modelClass)) {
            $model = new $modelClass();
        } else {
            $model = $modelClass;
            $modelClass = get_class($model);
        }

        $fillable = $model->getFillable();
        $casts = $model->getCasts();
        
        $fields = [];
        foreach ($fillable as $field) {
            $fields[$field] = [
                'type' => self::getFieldType($field, $casts[$field] ?? null),
                'label' => self::getFieldLabel($field),
                'required' => self::isFieldRequired($field),
                'options' => self::getFieldOptions($field, $modelClass),
            ];
        }

        return $fields;
    }

    /**
     * Determine field type based on field name and cast
     */
    private static function getFieldType(string $field, $cast = null): string
    {
        // Check cast first
        if ($cast) {
            if (str_contains($cast, 'date')) {
                return 'date';
            }
            if (str_contains($cast, 'decimal') || str_contains($cast, 'float')) {
                return 'number';
            }
            if (str_contains($cast, 'boolean')) {
                return 'checkbox';
            }
        }

        // Check field name patterns
        if (str_contains($field, 'email')) {
            return 'email';
        }
        if (str_contains($field, 'password')) {
            return 'password';
        }
        if (str_contains($field, 'phone') || str_contains($field, 'mobile')) {
            return 'tel';
        }
        if (str_contains($field, 'date')) {
            return 'date';
        }
        if (str_contains($field, 'description') || str_contains($field, 'content') || str_contains($field, 'notes') || str_contains($field, 'reason') || str_contains($field, 'remarks')) {
            return 'textarea';
        }
        if (str_contains($field, 'status') || str_contains($field, 'type') || str_contains($field, 'category')) {
            return 'select';
        }
        if (str_contains($field, 'id') && $field !== 'id') {
            return 'select'; // Foreign key
        }
        if (str_contains($field, 'is_') || str_contains($field, 'has_')) {
            return 'checkbox';
        }
        if (str_contains($field, 'amount') || str_contains($field, 'salary') || str_contains($field, 'budget') || str_contains($field, 'price') || str_contains($field, 'cost')) {
            return 'number';
        }

        return 'text';
    }

    /**
     * Get human-readable label from field name
     */
    private static function getFieldLabel(string $field): string
    {
        $label = str_replace('_', ' ', $field);
        $label = ucwords($label);
        
        // Handle special cases
        $label = str_replace('Id', 'ID', $label);
        $label = str_replace('Url', 'URL', $label);
        
        return $label;
    }

    /**
     * Check if field is required
     */
    private static function isFieldRequired(string $field): bool
    {
        $requiredFields = ['name', 'title', 'email', 'status'];
        return in_array($field, $requiredFields);
    }

    /**
     * Get options for select fields
     */
    private static function getFieldOptions(string $field, string $modelClass): array
    {
        $options = [];

        // Status fields
        if ($field === 'status') {
            $options = [
                'active' => 'Active',
                'inactive' => 'Inactive',
                'pending' => 'Pending',
                'approved' => 'Approved',
                'rejected' => 'Rejected',
                'closed' => 'Closed',
            ];
        }

        // Type fields
        if ($field === 'type' || str_contains($field, '_type')) {
            // This would need to be customized per model
            $options = [
                'standard' => 'Standard',
                'premium' => 'Premium',
                'basic' => 'Basic',
            ];
        }

        // Foreign key fields - get from related model
        if (str_ends_with($field, '_id')) {
            $relatedModel = str_replace('_id', '', $field);
            $relatedModel = str_replace(' ', '', ucwords(str_replace('_', ' ', $relatedModel)));
            $relatedModelClass = "App\\Models\\{$relatedModel}";
            
            if (class_exists($relatedModelClass)) {
                try {
                    $relatedRecords = $relatedModelClass::all();
                    foreach ($relatedRecords as $record) {
                        $options[$record->id] = $record->name ?? $record->title ?? $record->id;
                    }
                } catch (\Exception $e) {
                    // If model doesn't exist or query fails, return empty
                }
            }
        }

        return $options;
    }

    /**
     * Get route name from model class
     */
    public static function getRouteName($modelClass, string $action = 'index'): string
    {
        $modelName = class_basename($modelClass);
        $modelName = str_replace('Controller', '', $modelName);
        $modelName = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $modelName));
        $modelName = str_replace('_', '-', $modelName);
        
        // Handle pluralization
        if (!str_ends_with($modelName, 's')) {
            $modelName .= 's';
        }
        
        return $modelName . '.' . $action;
    }
}

