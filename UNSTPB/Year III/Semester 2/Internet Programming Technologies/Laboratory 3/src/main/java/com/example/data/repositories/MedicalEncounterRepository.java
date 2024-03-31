package com.example.data.repositories;

import com.example.data.domain.MedicalEncounter;
import org.springframework.data.repository.CrudRepository;

import java.util.List;

public interface MedicalEncounterRepository extends CrudRepository<MedicalEncounter,Long> {
    List<MedicalEncounter> findAll(); // overrides findAll to return a List
}
