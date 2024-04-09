package com.example.data.repositories;

import com.example.data.domain.CareProvider;
import com.example.data.domain.Patient;
import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;


import java.util.List;

@Repository
public interface CareProviderRepository extends CrudRepository<CareProvider, Long> {
    @Query("SELECT p FROM Patient p JOIN p.medicalEncounters e WHERE e.careProvider.name = :name")
    List<Patient> findAllPatientsByCareProviderName(@Param("name") String name);

    @Query("SELECT DISTINCT c FROM CareProvider c JOIN c.medicalEncounters e JOIN e.healthServices s JOIN e.patient.healthIssues i WHERE i.type = :type")
    List<CareProvider> findAllByHealthIssueType(@Param("type") String type);
}
